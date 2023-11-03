<?php

namespace App\Repositories\Interfaces;

use Carbon\Carbon;
use Illuminate\Support\Collection;

interface SaleRepositoryInterface
{
    public function register(array $data): object;

    public function getAllSales(): Collection;

    public function getSalesBySeller(int $sellerId): Collection;

    public function getSalesOfDay(Carbon $day): Collection;

    public function getSalesOfDayBySeller(int $sellerId, Carbon $day): Collection;
}
