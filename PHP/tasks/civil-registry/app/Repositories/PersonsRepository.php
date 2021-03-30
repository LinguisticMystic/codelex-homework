<?php

namespace App\Repositories;

use App\Models\Person;

interface PersonsRepository
{
    public function addPerson(Person $person): void;
    public function deletePerson(int $id): void;
    public function findPersonBySocialNumber(string $socialNumber): array;
    public function findPersonByName(string $name): array;
    public function editPerson(string $newDescription, int $id): void;
}