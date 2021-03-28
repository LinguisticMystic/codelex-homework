<?php

namespace App\Controllers;

use App\Controllers\Services\DeletePersonService;

class DeletePersonController
{
    public function deletePerson()
    {
        require_once __DIR__ . '/../Views/changeSuccessfulView.php';
        $service = new DeletePersonService();
        $service->execute();
    }
}