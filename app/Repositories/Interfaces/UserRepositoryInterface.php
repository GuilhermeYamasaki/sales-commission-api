<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function findWithEmail(string $email): ?object;
}
