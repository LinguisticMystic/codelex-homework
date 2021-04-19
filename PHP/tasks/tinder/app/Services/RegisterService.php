<?php

namespace App\Services;

use App\Models\RegistrationRequest;
use App\Models\User;
use App\Repositories\UsersRepository;

class RegisterService
{
    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(RegistrationRequest $request): void
    {
        $newUser = new User($request->username(), $request->sex(), $request->password());

        $this->repository->addUser($newUser);
    }
}