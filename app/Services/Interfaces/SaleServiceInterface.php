<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface SaleServiceInterface
{
    public function register(array $data): void;

    public function getAllSales(): Collection;

    public function getSalesBySeller(int $sellerId): Collection;
}
