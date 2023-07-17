<?php

use Core\Router;
use App\Exceptions\ValidationException;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

$router = new Router;
$router->get('/', [HomeController::class, 'index']);

$router->get('/register', [RegisterController::class, 'create']);
$router->post('/register', [RegisterController::class, 'store']);
$router->get('/login', [LoginController::class, 'create']);
$router->post('/login', [LoginController::class, 'store']);
$router->post('/logout', [LoginController::class, 'logout']);

$router->get('/job/create', [JobController::class, 'create']);
$router->post('/job/new', [JobController::class, 'store']);







// unflash errors and old values from form requests
