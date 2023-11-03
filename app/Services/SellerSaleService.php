<?php

namespace App\Services;

use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Repositories\Interfaces\SellerRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\SellerSaleServiceInterface;
use Carbon\Carbon;
use RuntimeException;

class SellerSaleService implements SellerSaleServiceInterface
{
    public function __construct(
        private readonly SaleRepositoryInterface $saleRepository,
        private readonly SellerRepositoryInterface $sellerRepository,
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    public function getSalesOfDayForAdmin(string $adminEmail, string $day): array
    {
        $user = $this->userRepository->findWithEmail($adminEmail);

        if (empty($user)) {
            throw new RuntimeException('Admin not exists.');
        }

        $day = Carbon::parse($day);
        $sales = $this->saleRepository->getSalesOfDay($day);
        $total = $sales->sum('sale_value');

        return [
            'user' => $user,
            'total' => number_format($total, 2, ',', '.'),
            'day' => $day->format('d/m/Y'),
        ];
    }

    public function getSalesOfDayBySeller(int $sellerId, string $day): array
    {
        $seller = $this->sellerRepository->findWithId($sellerId);

        if (empty($seller)) {
            throw new RuntimeException('Seller not exists, select a valid seller.');
        }

        $day = Carbon::parse($day);
        $sales = $this->saleRepository->getSalesOfDayBySeller($sellerId, $day);
        $amount = $sales->count();
        $total = $sales->sum('sale_value');
        $totalComission = $total * ($seller->comission / 100);

        return [
            'seller' => $seller,
            'total' => number_format($total, 2, ',', '.'),
            'day' => $day->format('d/m/Y'),
            'totalComission' => number_format($totalComission, 2, ',', '.'),
            'amount' => $amount,
        ];
    }
}
