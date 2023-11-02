<?php

namespace App\Repositories;

use App\Models\Seller;
use App\Repositories\Interfaces\SellerRepositoryInterface;
use Illuminate\Support\Collection;

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

    public function findWithId(int $id): ?object
    {
        return $this->model->find($id);
    }

    public function getAllSellers(): Collection
    {
        return $this->model->all();
    }

    public function deleteSeller(int $id): void
    {
        $this->model->find($id)->delete();
    }
}
