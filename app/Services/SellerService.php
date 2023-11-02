<?php

namespace App\Services;

use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Services\Interfaces\SellerServiceInterface;
use Illuminate\Support\Collection;
use RuntimeException;

class SellerService implements SellerServiceInterface
{
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
    }

    public function getAllSellers(): Collection
    {
        return $this->sellerRepository->getAllSellers()->makeHidden(['created_at', 'updated_at', 'deleted_at']);
    }

    public function deleteSeller(int $id): void
    {
        $this->sellerRepository->deleteSeller($id);
    }
}
