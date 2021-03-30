<?php

namespace App\Services;

use App\Repositories\PersonsRepository;

class FindPersonBySocialNumberService
{
    private PersonsRepository $repository;

    public function __construct(PersonsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        return $this->repository->findPersonBySocialNumber($_POST['query_socnumber']);
    }

}