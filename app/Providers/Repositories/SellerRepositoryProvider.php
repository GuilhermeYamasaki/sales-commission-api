<?php

namespace App\Providers\Repositories;

use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Repositories\SellerRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SellerRepositoryProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SellerRepositoryInterface::class, SellerRepository::class);
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [
            SellerRepositoryInterface::class,
        ];
    }
}
