<?php

namespace App\Repositories;

use App\Models\User;

interface UsersRepository
{
    public function addUser(User $user): void;
    public function findUserID(string $username): ?int;
    public function findUsername(int $id): ?string;
}