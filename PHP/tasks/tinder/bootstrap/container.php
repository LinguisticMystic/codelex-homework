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
use App\Repositories\MySQLPicturesRepository;
use App\Repositories\MySQLUsersRepository;
use App\Repositories\PicturesRepository;
use App\Repositories\UsersRepository;
use App\Services\ListGalleryService;
use App\Services\LoginService;
use App\Services\LogoutService;
use App\Services\RegisterService;
use App\Services\UploadService;

$container = new League\Container\Container;

$container->add(UsersRepository::class, MySQLUsersRepository::class);
$container->add(PicturesRepository::class, MySQLPicturesRepository::class);

$container->add(LoginService::class, LoginService::class)
    ->addArgument(UsersRepository::class);
$container->add(LogoutService::class, LogoutService::class);
$container->add(RegisterService::class, RegisterService::class)
    ->addArgument(UsersRepository::class);
$container->add(UploadService::class, UploadService::class)
    ->addArgument(PicturesRepository::class);
$container->add(ListGalleryService::class, ListGalleryService::class)
    ->addArgument(PicturesRepository::class);

$container->add(HomeController::class, HomeController::class)
    ->addArgument($twig);
$container->add(LoginController::class, LoginController::class)
    ->addArgument(LoginService::class);
$container->add(LogoutController::class, LogoutController::class)
    ->addArgument(LogoutService::class);
$container->add(RegisterController::class, RegisterController::class)
    ->addArguments([$twig, RegisterService::class]);
$container->add(RegistrationCompleteController::class, RegistrationCompleteController::class)
    ->addArgument($twig);
$container->add(DashboardController::class, DashboardController::class)
    ->addArgument($twig);
$container->add(ProfileController::class, ProfileController::class)
    ->addArgument($twig);
$container->add(EditGalleryController::class, EditGalleryController::class)
    ->addArguments([$twig, ListGalleryService::class]);
$container->add(UploadController::class, UploadController::class)
    ->addArgument(UploadService::class);

return $container;