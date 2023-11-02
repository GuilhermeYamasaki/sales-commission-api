<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface SaleRepositoryInterface
{
    public function register(array $data): object;

    public function getAllSales(): Collection;

    public function getSalesBySeller(int $id): object;
}
