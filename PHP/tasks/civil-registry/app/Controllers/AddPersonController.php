<?php

namespace App\Controllers;

use App\Services\AddPersonService;
use Twig\Environment;

class AddPersonController
{
    private Environment $environment;
    private AddPersonService $service;

    public function __construct(Environment $environment, AddPersonService $service)
    {
        $this->environment = $environment;
        $this->service = $service;
    }

    public function index()
    {
        echo $this->environment->render('addPersonView.php');
    }

    public function addPerson()
    {
        echo $this->environment->render('addPersonView.php');
        $this->service->execute();
    }
}