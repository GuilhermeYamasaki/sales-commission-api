<?php

namespace App\Services;

use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Services\Interfaces\SaleServiceInterface;
use Illuminate\Support\Collection;
use RuntimeException;

class SaleService implements SaleServiceInterface
{
    public function __construct(
        private readonly SaleRepositoryInterface $saleRepository,
        private readonly SellerRepositoryInterface $sellerRepository
    ) {

    }

    public function register(array $data): void
    {
        $existSeller = $this->sellerRepository->findWithId($data['seller_id']);

        if (empty($existSeller)) {
            throw new RuntimeException('Seller not exists, select a valid seller.');
        }

        $this->saleRepository->register($data);
    }

    public function getAllSales(): Collection
    {
        return $this->saleRepository->getAllSales();
    }

    public function getSalesBySeller(int $sellerId): Collection
    {
        return $this->saleRepository->getSalesBySeller($sellerId);
    }
}
