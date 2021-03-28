<?php

namespace App\Controllers;

use App\Controllers\Services\AddPersonService;

class AddPersonController
{
    public function addPerson()
    {
        require_once __DIR__ . '/../Views/addPersonView.php';
        $service = new AddPersonService();
        $service->execute();
    }
}