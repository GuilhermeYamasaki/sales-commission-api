<?php

namespace App\Console;

use App\Console\Commands\SendTotalSalesDayOfSellersCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendTotalSalesDayOfSellersCommand::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        /**
         * Commands
         */
        $schedule->command(SendTotalSalesDayOfSellersCommand::class)->dailyAt('00:00');

        /**
         * Jobs
         */
        $schedule->job(SendTotalSalesDayForAdminJob::class)->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Get the timezone that should be used by default for scheduled events.
     *
     * @return \DateTimeZone|string|null
     */
    protected function scheduleTimezone()
    {
        return 'America/Sao_Paulo';
    }
}
