<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\Interfaces\SaleRepositoryInterface;
use Carbon\Carbon;
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

    public function getAllSales(): Collection
    {
        return $this->model->all();
    }

    public function getSalesBySeller(int $sellerId): Collection
    {
        return $this->model->where('seller_id', $sellerId)->get();
    }

    public function getSalesOfDayBySeller(int $sellerId, Carbon $day): Collection
    {
        $start = $day->startOfDay()->format('Y-m-d H:i:s');
        $end = $day->endOfDay()->format('Y-m-d H:i:s');

        return $this->model
            ->where('seller_id', $sellerId)
            ->whereBetween('sale_at', [$start, $end])
            ->get();
    }
}
