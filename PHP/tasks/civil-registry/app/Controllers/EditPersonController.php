<?php

namespace App\Controllers;

use App\Controllers\Services\EditPersonService;

class EditPersonController
{
    public function editPerson()
    {
        require_once __DIR__ . '/../Views/changeSuccessfulView.php';
        $service = new EditPersonService();
        $service->execute();
    }
}