<?php

namespace App\Jobs;

use App\Mail\SendTotalSalesDayOfSellerMail;
use App\Services\Interfaces\SellerSaleServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTotalSalesDayOfSellerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly int $sellerId,
        private readonly string $day
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(SellerSaleServiceInterface $sellerSaleService): void
    {
        $data = $sellerSaleService->getSalesOfDayBySeller($this->sellerId, $this->day);

        $mail = new SendTotalSalesDayOfSellerMail($data);

        Mail::to($data['seller']->email)->send($mail);
    }
}
