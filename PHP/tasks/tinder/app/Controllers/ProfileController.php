<?php

namespace App\Controllers;

use Twig\Environment;

class ProfileController
{
    private Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function index()
    {
        echo $this->environment->render('profileView.php', [
            'username' => $_SESSION['auth_id'],
            'errors' => $_SESSION['_flash']['errors']
        ]);
    }
}