<?php

use League\Route\Router;
use Psr\Container\ContainerInterface;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

return static function(Router $router, ContainerInterface $container)
{
    $router->get('/', HomeController::class);
    $router->get('/dashboard', DashboardController::class);
    $router->get('/register', [RegisterController::class, 'registerForm']);
    $router->post('/register', [RegisterController::class, 'register']);
    $router->get('/login', [LoginController::class, 'loginForm']);
    $router->post('/login', [LoginController::class, 'login']);
    $router->post('/logout', LogoutController::class);
    $router->get('/users/{user}', UserController::class);
};