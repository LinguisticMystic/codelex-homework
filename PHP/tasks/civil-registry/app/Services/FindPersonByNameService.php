<?php

namespace App\Services;

use App\Repositories\PersonsRepository;

class FindPersonByNameService
{
    private PersonsRepository $repository;

    public function __construct(PersonsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        return $this->repository->findPersonByName($_POST['query_name']);
    }
}