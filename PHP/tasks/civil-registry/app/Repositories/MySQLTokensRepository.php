<?php

namespace App\Repositories;

use App\Models\Token;
use Medoo\Medoo;

class MySQLTokensRepository implements TokensRepository
{
    private Medoo $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'civil_registry',
            'server' => 'localhost',
            'username' => 'root',
            'password' => 'aija'
        ]);
    }

    public function addToken(Token $token): void
    {
        $this->database->insert('tokens', [
            'userID' => $token->id(),
            'token' => $token->key(),
            'time' => $token->time()
        ]);
    }

    public function findToken(string $token): array
    {
        return $this->database->select('tokens', [
            'userID',
            'token',
            'time'
        ], [
            'token' => $token
        ]);
    }
}