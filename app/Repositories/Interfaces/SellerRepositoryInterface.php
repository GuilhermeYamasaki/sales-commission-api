<?php

namespace App\Repositories\Interfaces;

interface SellerRepositoryInterface
{
    public function register(array $data): object;

    public function findWithEmail(string $email): ?object;
}
