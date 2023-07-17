<?php

use Core\Router;
use App\Exceptions\ValidationException;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

$router = new Router;
$router->get('/', [HomeController::class, 'index']);

$router->get('/register', [RegisterController::class, 'create'])->guard('guest');
$router->post('/register', [RegisterController::class, 'store'])->guard('guest');
$router->get('/login', [LoginController::class, 'create'])->guard('guest');
$router->post('/login', [LoginController::class, 'store'])->guard('guest');
$router->post('/logout', [LoginController::class, 'logout'])->guard('auth');

$router->get('/jobs', [JobController::class, 'index']);
$router->get('/job/create', [JobController::class, 'create'])->guard('auth');
$router->post('/job/new', [JobController::class, 'store']);







// unflash errors and old values from form requests
