<?php

namespace App\Controllers;

use App\Services\DeletePersonService;

class DeletePersonController
{
    private DeletePersonService $service;

    public function __construct(DeletePersonService $service)
    {
        $this->service = $service;
    }

    public function deletePerson()
    {
        require_once __DIR__ . '/../Views/changeSuccessfulView.php';
        $this->service->execute();
    }
}