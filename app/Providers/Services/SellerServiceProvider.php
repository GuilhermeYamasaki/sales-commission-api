<?php

namespace App\Providers\Services;

use App\Services\Contracts\SellerServiceInterface;
use App\Services\SellerService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SellerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SellerServiceInterface::class, SellerService::class);
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [
            SellerServiceInterface::class,
        ];
    }
}
