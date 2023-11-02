<?php

namespace App\Providers\Services;

use App\Services\Interfaces\SaleServiceInterface;
use App\Services\SaleService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SaleServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SaleServiceInterface::class, SaleService::class);
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [
            SaleServiceInterface::class,
        ];
    }
}
