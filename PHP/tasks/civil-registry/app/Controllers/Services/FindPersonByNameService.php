<?php

namespace App\Controllers\Services;

use App\Models\MySQLPersonsRepository;

class FindPersonByNameService
{
    public function execute(): array
    {
        $repository = new MySQLPersonsRepository();

        return $repository->findPersonByName($_POST['query_name']);
    }

}