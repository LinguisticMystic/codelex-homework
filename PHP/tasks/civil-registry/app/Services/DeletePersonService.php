<?php

namespace App\Services;

use App\Repositories\PersonsRepository;

class DeletePersonService
{
    private PersonsRepository $repository;

    public function __construct(PersonsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): void
    {
        $this->repository->deletePerson($_POST['delete']);
    }
}