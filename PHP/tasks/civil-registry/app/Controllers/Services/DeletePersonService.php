<?php

namespace App\Controllers\Services;

use App\Models\MySQLPersonsRepository;

class DeletePersonService
{
    public function execute(): void
    {
        $repository = new MySQLPersonsRepository();

        $repository->deletePerson($_POST['delete']);
    }
}