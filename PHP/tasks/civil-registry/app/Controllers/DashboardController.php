<?php

namespace App\Controllers;

use App\Repositories\PersonsRepository;
use Twig\Environment;

class DashboardController
{
    private Environment $environment;
    private PersonsRepository $repository;

    public function __construct(Environment $environment, PersonsRepository $repository)
    {
        $this->environment = $environment;
        $this->repository = $repository;
    }

    public function index()
    {
        $user = $this->repository->findPersonByID($_SESSION['auth_id']);

        echo $this->environment->render('dashboardView.php', [
            'userName' => $user[0]['name']
        ]);
    }

    public function logout()
    {
        unset ($_SESSION['auth_id']);
        header('Location: /');
    }
}