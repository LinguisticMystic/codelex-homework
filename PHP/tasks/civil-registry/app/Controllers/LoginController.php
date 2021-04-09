<?php

namespace App\Controllers;

use App\Services\LoginService;
use Twig\Environment;

class LoginController
{
    private Environment $environment;
    private LoginService $loginService;

    public function __construct(Environment $environment, LoginService $loginService)
    {
        $this->environment = $environment;
        $this->loginService = $loginService;
    }

    public function index()
    {
        $isTokenValid = $this->loginService->execute();

        echo $this->environment->render('authView.php', [
            'isTokenValid' => $isTokenValid
        ]);
    }
}