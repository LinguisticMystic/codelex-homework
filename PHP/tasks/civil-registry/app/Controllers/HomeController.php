<?php

namespace App\Controllers;

use App\Services\AuthenticationService;
use Twig\Environment;

class HomeController
{
    private Environment $environment;
    private AuthenticationService $authService;

    public function __construct(Environment $environment, AuthenticationService $authService)
    {
        $this->environment = $environment;
        $this->authService = $authService;
    }

    public function index()
    {
        $loginLink = $this->authService->execute();

        echo $this->environment->render('indexView.php', [
            'siteName' => 'the Civil registry',
            'loginLink' => $loginLink,
            'successfulAuthentication' => $_SESSION['_message']
        ]);
    }
}