<?php

namespace App\Services;

use App\Repositories\PersonsRepository;

class FindPersonByAgeService
{
    private PersonsRepository $repository;

    public function __construct(PersonsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        return $this->repository->findPersonByAge($_POST['query_age']);
    }

}