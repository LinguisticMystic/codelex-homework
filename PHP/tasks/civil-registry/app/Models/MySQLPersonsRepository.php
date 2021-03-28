<?php

namespace App\Models;

use Medoo\Medoo;

interface PersonsRepository
{
    public function addPerson(Person $person): void;
    public function deletePerson(int $id): void;
}


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
            'description' => $person->description()
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
            'description'
        ], [
            'name' => $name
        ]);
    }

    public function editPerson(string $newDescription, int $id): void
    {
        $this->database->update('persons', ['description' => $newDescription], ['id'=>$id]);
    }
}