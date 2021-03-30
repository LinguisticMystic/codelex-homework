<?php

namespace App\Services;

use App\Repositories\PersonsRepository;

class EditPersonService
{
    private PersonsRepository $repository;

    public function __construct(PersonsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): void
    {
        $this->repository->editPerson($_POST['edit_description'], $_POST['edit']);
    }
}