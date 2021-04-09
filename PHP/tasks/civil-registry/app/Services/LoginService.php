<?php

namespace App\Services;

use App\Repositories\TokensRepository;

class LoginService
{
    private TokensRepository $repository;

    public function __construct(TokensRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): bool
    {
        $tokenInDataBase = $this->repository->findToken($_GET['token']);

        $_SESSION['auth_id'] = $tokenInDataBase[0]['userID'];

        return $_GET['token'] === $tokenInDataBase[0]['token'] && $tokenInDataBase[0]['time'] > time();
    }
}