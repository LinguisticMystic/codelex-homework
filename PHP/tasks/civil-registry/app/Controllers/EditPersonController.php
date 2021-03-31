<?php

namespace App\Controllers;

use App\Services\EditPersonService;
use Twig\Environment;

class EditPersonController
{
    private Environment $environment;
    private EditPersonService $service;

    public function __construct(Environment $environment, EditPersonService $service)
    {
        $this->environment = $environment;
        $this->service = $service;
    }

    public function editPerson()
    {
        echo $this->environment->render('changesMadeView.php');
        $this->service->execute();
    }
}