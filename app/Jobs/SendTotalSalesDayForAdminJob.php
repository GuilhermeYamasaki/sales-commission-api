<?php

namespace App\Jobs;

use App\Mail\SendTotalSalesDayForAdminMail;
use App\Services\Interfaces\SellerSaleServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTotalSalesDayForAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private ?string $day = null
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(SellerSaleServiceInterface $sellerSaleService): void
    {
        // If the day is not passed, the day before is used
        $this->day ??= now()->subDay()->format('Y-m-d');

        $adminEmail = config('admin.email');

        $data = $sellerSaleService->getSalesOfDayForAdmin($adminEmail, $this->day);

        $mail = new SendTotalSalesDayForAdminMail($data);

        Mail::to($data['user']->email)->send($mail);
    }
}
