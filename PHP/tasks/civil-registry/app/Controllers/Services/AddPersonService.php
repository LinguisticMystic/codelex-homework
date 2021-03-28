<?php

namespace App\Controllers\Services;

use App\Models\MySQLPersonsRepository;
use App\Models\Person;

class AddPersonService
{
    public function execute(): void
    {
        $repository = new MySQLPersonsRepository();

        try {
            $repository->addPerson(new Person($_POST['name'], $_POST['socnumber'], $_POST['description']));
            if (!empty($_POST['name']) && !empty($_POST['socnumber'])) {
                echo 'Person added!';
            }
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }
}