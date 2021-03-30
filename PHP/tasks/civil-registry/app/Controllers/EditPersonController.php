<?php

namespace App\Controllers;

use App\Services\EditPersonService;

class EditPersonController
{
    private EditPersonService $service;

    public function __construct(EditPersonService $service)
    {
        $this->service = $service;
    }

    public function editPerson()
    {
        require_once __DIR__ . '/../Views/changeSuccessfulView.php';
        $this->service->execute();
    }
}