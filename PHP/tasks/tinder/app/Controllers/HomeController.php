<?php

namespace App\Controllers;

use Twig\Environment;

class HomeController
{
    private Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function index()
    {
//        file_get_contents('../storage/files/private/biggie-chungus.jpg');
//        header('Content-Type: application/octet-stream');
//        header('Content-Disposition: attachment; filename=yo.png');

        echo $this->environment->render('indexView.php', [
            'errors' => $_SESSION['_flash']['errors']
        ]);
    }
}