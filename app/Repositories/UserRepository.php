<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private readonly User $model
    ) {
    }

    public function findWithEmail(string $email): ?object
    {
        return $this->model->where('email', $email)->first();
    }

    public function authenticate(array $credentials): ?string
    {
        if (! Auth::attempt($credentials)) {
            return null;
        }

        $user = Auth::user();

        $user->tokens()->delete();

        return $user->createToken(
            'auth',
            ['*'],
            now()->addMinutes(30)
        )->plainTextToken;
    }

    public function logout(): void
    {
        if (! Auth::check()) {
            return;
        }

        $user = Auth::user();

        $user->tokens()->delete();

        Auth::logout();
    }
}
