<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SaleStoreRequest;
use App\Services\Interfaces\SaleServiceInterface;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    public function __construct(
        private readonly SaleServiceInterface $saleService
    ) {

    }

    public function store(SaleStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $this->saleService->register($data);

            return response()->json(['message' => 'Sale saved successfully'], Response::HTTP_CREATED);

        } catch (Exception $exception) {

            Log::error(null, [
                'request' => $request->all(),
                'exception' => $exception,
            ]);

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function index()
    {
        try {
            $sales = $this->saleService->getAllSales();

            return response()->json(['sales' => $sales], Response::HTTP_OK);

        } catch (Exception $exception) {

            Log::error(null, [
                'exception' => $exception,
            ]);

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
