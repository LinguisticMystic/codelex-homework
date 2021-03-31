<?php

namespace App\Services;

use App\Models\Person;
use App\Repositories\PersonsRepository;

class AddPersonService
{
    private PersonsRepository $repository;

    public function __construct(PersonsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): void
    {
        try {
            $this->repository->addPerson(new Person($_POST['name'], $_POST['socnumber'], $_POST['description'], $_POST['age'], $_POST['address']));
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }
}