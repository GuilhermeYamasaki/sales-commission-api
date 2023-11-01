<?php

namespace App\Services;

use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Services\Interfaces\SellerServiceInterface;
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
}
