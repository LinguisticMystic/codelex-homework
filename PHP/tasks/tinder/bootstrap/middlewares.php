<?php

use App\Controllers\DashboardController;
use App\Controllers\EditGalleryController;
use App\Controllers\HomeController;
use App\Controllers\ProfileController;
use App\Middlewares\AuthenticationMiddleware;
use App\Middlewares\CheckLogoutMiddleware;

return [
    DashboardController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    ProfileController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    EditGalleryController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    HomeController::class . '@index' => [
        CheckLogoutMiddleware::class
    ],
];