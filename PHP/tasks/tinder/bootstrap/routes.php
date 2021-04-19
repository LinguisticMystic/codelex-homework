<?php

use App\Controllers\DashboardController;
use App\Controllers\EditGalleryController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\ProfileController;
use App\Controllers\RegisterController;
use App\Controllers\RegistrationCompleteController;
use App\Controllers\UploadController;

return [
    ['GET', '/', [HomeController::class, 'index']],
    ['POST', '/', [HomeController::class, 'index']],
    ['POST', '/login', [LoginController::class, 'login']],
    ['POST', '/logout', [LogoutController::class, 'logout']],
    ['GET', '/register', [RegisterController::class, 'index']],
    ['POST', '/register', [RegisterController::class, 'register']],
    ['GET', '/complete', [RegistrationCompleteController::class, 'index']],
    ['GET', '/dashboard', [DashboardController::class, 'index']],
    ['GET', '/profile', [ProfileController::class, 'index']],
    ['GET', '/edit-gallery', [EditGalleryController::class, 'index']],
    ['POST', '/upload', [UploadController::class, 'upload']]
];