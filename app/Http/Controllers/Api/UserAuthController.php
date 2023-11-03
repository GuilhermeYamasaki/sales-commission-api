<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserAuthStoreRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UserAuthController extends Controller
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository
    ) {
    }

    public function store(UserAuthStoreRequest $request)
    {
        try {
            $credentials = $request->validated();
            $token = $this->userRepository->authenticate($credentials);

            if (empty($token)) {
                return response()->json(['message' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
            }

            return response()->json(['token' => $token], Response::HTTP_OK);
        } catch (Exception $exception) {

            Log::error(null, [
                'request' => $request->all(),
                'exception' => $exception,
            ]);

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy()
    {
        try {
            $this->userRepository->logout();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $exception) {

            Log::error(null, [
                'exception' => $exception,
            ]);

            return response()->json(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
