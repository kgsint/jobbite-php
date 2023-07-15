<?php

use Core\Router;
use App\Http\Controllers\HomeController;

$router = new Router;

$router->get('/', [HomeController::class, 'index']);


// original path without query string
$uri = parse_url($_SERVER['REQUEST_URI'])['path']; 

// check if there is PUT, PATCH  DELETE, form-request, if not GET or POST
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; 

$router->resolve($uri, $method);