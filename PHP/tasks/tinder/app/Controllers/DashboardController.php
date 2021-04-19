<?php

namespace App\Controllers;

use Twig\Environment;

class DashboardController
{
    private Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function index()
    {
        echo $this->environment->render('dashboardView.php', [
            'errors' => $_SESSION['_flash']['errors']
        ]);
    }
}