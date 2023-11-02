<?php

namespace App\Services;

use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Services\Interfaces\SellerSaleServiceInterface;
use Carbon\Carbon;
use RuntimeException;

class SellerSaleService implements SellerSaleServiceInterface
{
    public function __construct(
        private readonly SaleRepositoryInterface $saleRepository,
        private readonly SellerRepositoryInterface $sellerRepository
    ) {

    }

    public function getSalesOfDayBySeller(int $sellerId, string $day): array
    {
        $existSeller = $this->sellerRepository->findWithId($sellerId);

        if (empty($existSeller)) {
            throw new RuntimeException('Seller not exists, select a valid seller.');
        }

        $day = Carbon::parse($day);
        $sales = $this->saleRepository->getSalesOfDayBySeller($sellerId, $day);
        $total = $sales->sum('sale_value');

        return [
            'seller' => $existSeller,
            'total' => number_format($total, 2, ',', '.'),
            'day' => $day->format('d/m/Y'),
        ];
    }
}
