<?php

namespace App\Repositories;

use App\Models\Seller;
use App\Repositories\Interfaces\SellerRepositoryInterface;

class SellerRepository implements SellerRepositoryInterface
{
    public function __construct(
        private readonly Seller $model
    ) {

    }

    public function register(array $data): object
    {
        return $this->model->create($data);
    }

    public function findWithEmail(string $email): ?object
    {
        return $this->model->where('email', $email)->first();
    }
}
