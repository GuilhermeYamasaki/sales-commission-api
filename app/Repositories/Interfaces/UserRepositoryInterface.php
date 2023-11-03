<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function findWithEmail(string $email): ?object;

    public function authenticate(array $credentials): ?string;

    public function logout(): void;
}
