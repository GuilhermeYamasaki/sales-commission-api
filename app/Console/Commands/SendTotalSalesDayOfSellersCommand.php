<?php

namespace App\Console\Commands;

use App\Jobs\SendTotalSalesDayOfSellerJob;
use App\Services\Interfaces\SellerServiceInterface;
use Illuminate\Console\Command;

class SendTotalSalesDayOfSellersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sellers:send-total-sales-day {day?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch mail with total comission of day for all sellers';

    /**
     * Execute the console command.
     */
    public function handle(
        SellerServiceInterface $sellerService,
    ) {
        $sellers = $sellerService->getAllSellers();

        // When not pass day, use yesterday, normally this command is executed in 00:00
        $day = $this->argument('day') ?? now()->subDay()->format('Y-m-d');

        $sellers->each(function ($seller, $key) use ($day) {
            SendTotalSalesDayOfSellerJob::dispatch($seller->id, $day)
                ->delay(now()->addSeconds($key * 5)); // Delay 5 seconds for each seller
        });
    }
}
