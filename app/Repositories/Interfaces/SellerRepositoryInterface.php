<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface SellerRepositoryInterface
{
    public function register(array $data): object;

    public function findWithEmail(string $email): ?object;

    public function findWithId(int $id): ?object;

    public function getAllSellers(): Collection;

    public function deleteSeller(int $id): void;
}
