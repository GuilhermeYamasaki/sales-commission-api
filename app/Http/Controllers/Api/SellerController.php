<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SellerStoreRequest;
use App\Services\Interfaces\SellerServiceInterface;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class SellerController extends Controller
{
    public function __construct(
        private readonly SellerServiceInterface $sellerService
    ) {

    }

    public function store(SellerStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $this->sellerService->register($data);

            return response()->json(['message' => 'Seller created successfully'], Response::HTTP_CREATED);

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
            $sellers = $this->sellerService->getAllSellers();

            return response()->json(['sellers' => $sellers], Response::HTTP_OK);

        } catch (Exception $exception) {

            Log::error(null, [
                'exception' => $exception,
            ]);

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete(int $id)
    {
        try {
            $this->sellerService->deleteSeller($id);

            return response()->json(['message' => 'Seller deleted successfully'], Response::HTTP_OK);

        } catch (Exception $exception) {

            Log::error(null, [
                'exception' => $exception,
            ]);

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
