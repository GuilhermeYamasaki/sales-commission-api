<?php

namespace App\Services\Interfaces;

interface SellerSaleServiceInterface
{
    public function getSalesOfDayForAdmin(string $adminEmail, string $day): array;

    public function getSalesOfDayBySeller(int $sellerId, string $day): array;
}
