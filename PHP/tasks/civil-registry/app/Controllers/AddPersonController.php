<?php

namespace App\Controllers;

use App\Services\AddPersonService;

class AddPersonController
{
    private AddPersonService $service;

    public function __construct(AddPersonService $service)
    {
        $this->service = $service;
    }

    public function addPerson()
    {
        require_once __DIR__ . '/../Views/addPersonView.php';
        $this->service->execute();
    }
}