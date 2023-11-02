<?php

namespace App\Providers\Repositories;

use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Repositories\SaleRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class SaleRepositoryProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
    }

    /**
     * @return string[]
     */
    public function provides()
    {
        return [
            SaleRepositoryInterface::class,
        ];
    }
}
