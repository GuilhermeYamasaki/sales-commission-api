<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;

interface SellerServiceInterface
{
    public function register(array $data): void;

    public function getAllSellers(): Collection;

    public function deleteSeller(int $id): void;
}
