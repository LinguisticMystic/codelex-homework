<?php

namespace App\Repositories;

use App\Models\Token;

interface TokensRepository
{
    public function addToken(Token $token): void;
    public function findToken(string $token): array;
}