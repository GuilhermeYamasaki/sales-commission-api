<?php

namespace App\Providers\Services;

use App\Services\Interfaces\SellerSaleServiceInterface;
use App\Services\SellerSaleService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SellerSaleServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SellerSaleServiceInterface::class, SellerSaleService::class);
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [
            SellerSaleServiceInterface::class,
        ];
    }
}
