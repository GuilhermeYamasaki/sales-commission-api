<?php

namespace App\Services\Interfaces;

interface SellerSaleServiceInterface
{
    public function getSalesOfDayBySeller(int $sellerId, string $day): array;
}
