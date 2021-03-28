<?php

namespace App\Controllers\Services;

use App\Models\MySQLPersonsRepository;

class FindPersonBySocialNumberService
{
    public function execute(): array
    {
        $repository = new MySQLPersonsRepository();

        return $repository->findPersonBySocialNumber($_POST['query_socnumber']);
    }

}