<?php

use App\Controllers\AddPersonController;
use App\Controllers\DeletePersonController;
use App\Controllers\EditPersonController;
use App\Controllers\HomeController;
use App\Controllers\SearchPersonController;
use App\Controllers\SearchResultsController;
use App\Repositories\MySQLPersonsRepository;
use App\Repositories\PersonsRepository;
use App\Services\AddPersonService;
use App\Services\DeletePersonService;
use App\Services\EditPersonService;
use App\Services\FindPersonByAddressService;
use App\Services\FindPersonByAgeService;
use App\Services\FindPersonByNameService;
use App\Services\FindPersonBySocialNumberService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';

//Twig
$loader = new FilesystemLoader('../app/Views');
$twig = new Environment($loader);

//Container
$container = new League\Container\Container;

$container->add(PersonsRepository::class, MySQLPersonsRepository::class);

$container->add(AddPersonService::class, AddPersonService::class)
    ->addArgument(PersonsRepository::class);
$container->add(DeletePersonService::class, DeletePersonService::class)
    ->addArgument(PersonsRepository::class);
$container->add(EditPersonService::class, EditPersonService::class)
    ->addArgument(PersonsRepository::class);
$container->add(FindPersonByNameService::class, FindPersonByNameService::class)
    ->addArgument(PersonsRepository::class);
$container->add(FindPersonBySocialNumberService::class, FindPersonBySocialNumberService::class)
    ->addArgument(PersonsRepository::class);
$container->add(FindPersonByAgeService::class, FindPersonByAgeService::class)
    ->addArgument(PersonsRepository::class);
$container->add(FindPersonByAddressService::class, FindPersonByAddressService::class)
    ->addArgument(PersonsRepository::class);

$container->add(HomeController::class, HomeController::class)
    ->addArgument($twig);
$container->add(AddPersonController::class, AddPersonController::class)
    ->addArguments([$twig, AddPersonService::class]);
$container->add(DeletePersonController::class, DeletePersonController::class)
    ->addArguments([$twig, DeletePersonService::class]);
$container->add(EditPersonController::class, EditPersonController::class)
    ->addArguments([$twig, EditPersonService::class]);
$container->add(SearchResultsController::class, SearchResultsController::class)
    ->addArguments([
        $twig,
        FindPersonByNameService::class,
        FindPersonBySocialNumberService::class,
        FindPersonByAgeService::class, FindPersonByAddressService::class]);
$container->add(SearchPersonController::class, SearchPersonController::class);


//Routes
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'index']);
    $r->addRoute('POST', '/', [HomeController::class, 'index']);
    $r->addRoute('GET', '/search-person', [SearchPersonController::class, 'index']);
    $r->addRoute('POST', '/search-results', [SearchResultsController::class, 'getResults']);
    $r->addRoute('GET', '/add-person', [AddPersonController::class, 'index']);
    $r->addRoute('POST', '/add-person', [AddPersonController::class, 'addPerson']);
    $r->addRoute('POST', '/delete-person', [DeletePersonController::class, 'deletePerson']);
    $r->addRoute('POST', '/edit-person', [EditPersonController::class, 'editPerson']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:

        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$controller, $method] = $handler;

        //call_user_func_array([new $controller, $method], $vars);
        //call_user_func_array([$container->get($controller), $method], $vars);

        //echo (new $controller($container->get(StorePersonService::class)))->$method($vars);
        //echo ($container->get($controller))->$method($vars);
        //(new $controller($container->get(AddPersonService::class)))->$method($vars);

        ($container->get($controller))->$method($vars);

        break;
}