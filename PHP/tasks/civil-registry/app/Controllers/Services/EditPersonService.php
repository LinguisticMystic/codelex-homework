<?php

namespace App\Controllers\Services;

use App\Models\MySQLPersonsRepository;
use App\Models\Person;

class EditPersonService
{
    public function execute(): void
    {
        $repository = new MySQLPersonsRepository();

        $repository->editPerson($_POST['edit_description'], $_POST['edit']);
    }
}