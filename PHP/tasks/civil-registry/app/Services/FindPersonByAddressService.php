<?php

namespace App\Services;

use App\Repositories\PersonsRepository;

class FindPersonByAddressService
{
    private PersonsRepository $repository;

    public function __construct(PersonsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        return $this->repository->findPersonByAddress($_POST['query_address']);
    }

}