<?php

namespace App\Services;

use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Services\Interfaces\SaleServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class SaleService implements SaleServiceInterface
{
    public const CACHE_ALL_SALES = 'api-all-sales';

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

        $this->clearCache($data['seller_id']);
    }

    public function getAllSales(): Collection
    {
        return Cache::remember(self::CACHE_ALL_SALES, 60 * 20, function () {
            return $this->saleRepository->getAllSales();
        });
    }

    public function getSalesBySeller(int $sellerId): Collection
    {
        return Cache::remember(self::CACHE_ALL_SALES."seller-{$sellerId}", 60 * 20, function () use ($sellerId) {
            return $this->saleRepository->getSalesBySeller($sellerId);
        });
    }

    private function clearCache(int $sellerId): void
    {
        Cache::forget(self::CACHE_ALL_SALES);
        Cache::forget(self::CACHE_ALL_SALES."seller-{$sellerId}");
    }
}
