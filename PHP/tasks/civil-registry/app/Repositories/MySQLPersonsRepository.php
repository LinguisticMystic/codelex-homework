<?php

namespace App\Repositories;

use App\Models\Person;
use Medoo\Medoo;

class MySQLPersonsRepository implements PersonsRepository
{
    private Medoo $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'civil_registry',
            'server' => 'localhost',
            'username' => 'root',
            'password' => 'aija'
        ]);
    }

    public function addPerson(Person $person): void
    {
        $this->database->insert('persons', [
            'name' => $person->name(),
            'socnumber' => $person->socialNumber(),
            'description' => $person->description(),
            'age' => $person->age(),
            'address' => $person->address(),
        ]);
    }

    public function deletePerson(int $id): void
    {
        $this->database->delete('persons',['id'=>$id]);
    }

    public function findPersonBySocialNumber(string $socialNumber): array
    {
        return $this->database->select('persons', [
            'id',
            'name',
            'socnumber',
            'description'
        ], [
            'socnumber' => $socialNumber
        ]);
    }

    public function findPersonByName(string $name): array
    {
        return $this->database->select('persons', [
            'id',
            'name',
            'socnumber',
            'description',
            'age',
            'address'
        ], [
            'name' => $name
        ]);
    }

    public function findPersonByAge(int $age): array
    {
        return $this->database->select('persons', [
            'id',
            'name',
            'socnumber',
            'description',
            'age',
            'address'
        ], [
            'age' => $age
        ]);
    }

    public function findPersonByAddress(string $address): array
    {
        return $this->database->select('persons', [
            'id',
            'name',
            'socnumber',
            'description',
            'age',
            'address'
        ], [
            'address' => $address
        ]);
    }

    public function editPerson(string $newDescription, int $id): void
    {
        $this->database->update('persons', ['description' => $newDescription], ['id'=>$id]);
    }

    public function findPersonByID(int $id): array
    {
        return $this->database->select('persons', [
            'id',
            'name'
        ], [
            'id' => $id
        ]);
    }
}