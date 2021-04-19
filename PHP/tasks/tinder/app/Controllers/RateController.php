<?php

namespace App\Controllers;

use App\Services\LikeService;

class LikeController
{
    private LikeService $service;

    public function __construct(
        LikeService $service
    )
    {
        $this->service = $service;
    }

    public function like()
    {
        var_dump('image liked');
        var_dump($_POST);
        $rating = $this->service->execute();

        var_dump($rating);
        //header('Location: /dashboard');
    }
}