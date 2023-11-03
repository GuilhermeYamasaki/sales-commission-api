<?php

namespace App\Services;

use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Services\Interfaces\SellerServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class SellerService implements SellerServiceInterface
{
    public const CACHE_ALL_SELLERS = 'api-all-sellers';

    public function __construct(
        private readonly SellerRepositoryInterface $sellerRepository
    ) {
    }

    public function register(array $data): void
    {
        $existEmail = $this->sellerRepository->findWithEmail($data['email']);

        if ($existEmail) {
            throw new RuntimeException('Email already exists');
        }

        $this->sellerRepository->register($data);

        Cache::forget(self::CACHE_ALL_SELLERS);
    }

    public function getAllSellers(): Collection
    {
        return Cache::remember(self::CACHE_ALL_SELLERS, 60 * 20, function () {
            return $this->sellerRepository->getAllSellers();
        });
    }

    public function deleteSeller(int $id): void
    {
        $this->sellerRepository->deleteSeller($id);
        Cache::forget(self::CACHE_ALL_SELLERS);
    }

    public function updateSellerData(array $data): void
    {
        $existEmail = $this->sellerRepository->findWithEmail($data['email']);

        if ($existEmail && $existEmail->id != $data['id']) {
            throw new RuntimeException('Email already exists');
        }

        $this->sellerRepository->updateSellerData($data);

        Cache::forget(self::CACHE_ALL_SELLERS);
    }
}
