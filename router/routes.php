<?php

use App\Exceptions\ValidationException;
use Core\Router;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

$router = new Router;
$router->get('/', [HomeController::class, 'index']);

$router->get('/login', [LoginController::class, 'create']);
$router->get('/register', [RegisterController::class, 'create']);
$router->post('/register', [RegisterController::class, 'store']);







// unflash errors and old values from form requests
