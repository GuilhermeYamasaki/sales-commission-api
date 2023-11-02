<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\SaleServiceInterface;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SellerSaleController extends Controller
{
    public function __construct(
        private readonly SaleServiceInterface $saleService
    ) {

    }

    public function show(int $id)
    {
        try {
            $sale = $this->saleService->getSalesBySeller($id);

            return response()->json(['sales' => $sale], Response::HTTP_OK);

        } catch (Exception $exception) {

            Log::error(null, [
                'exception' => $exception,
            ]);

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
