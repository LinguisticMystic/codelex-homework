<?php

namespace App\Controllers;

use App\Services\DeletePersonService;
use Twig\Environment;

class DeletePersonController
{
    private Environment $environment;
    private DeletePersonService $service;

    public function __construct(Environment $environment, DeletePersonService $service)
    {
        $this->environment = $environment;
        $this->service = $service;
    }

    public function deletePerson()
    {
        echo $this->environment->render('changesMadeView.php');
        $this->service->execute();
    }
}