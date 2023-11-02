<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\Interfaces\SaleRepositoryInterface;
use Illuminate\Support\Collection;

class SaleRepository implements SaleRepositoryInterface
{
    public function __construct(
        private readonly Sale $model
    ) {

    }

    public function register(array $data): object
    {
        return $this->model->create($data);
    }

    //não preciso achar onde saller_id pois ele sempre vai existir confirmar
    public function getAllSales(): Collection
    {
        return $this->model->all();
    }

    public function getSalesBySeller(int $sellerId): Collection
    {
        return $this->model->where('seller_id', $sellerId)->get();
    }
}
