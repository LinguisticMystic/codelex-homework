<?php

require_once 'vendor/autoload.php';

use App\Controllers\AddPersonController;
use App\Controllers\DeletePersonController;
use App\Controllers\EditPersonController;
use App\Controllers\HomeController;
use App\Controllers\SearchPersonController;
use App\Controllers\SearchResultsController;
use App\Models\MySQLPersonsRepository;

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'index']);
    $r->addRoute('POST', '/', [HomeController::class, 'index']);
    $r->addRoute('POST', '/search-person', [SearchPersonController::class, 'search']);
    $r->addRoute('POST', '/search-results', [SearchResultsController::class, 'getResults']);
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

        [$class, $method] = $handler;
        call_user_func_array([new $class, $method], $vars);
        break;
}