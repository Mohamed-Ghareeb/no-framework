<?php

use League\Route\Router;
use Psr\Container\ContainerInterface;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\FlashOldData;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfGuest;
use League\Route\RouteGroup;

return static function (Router $router, ContainerInterface $container) {
    $router->middleware($container->get('csrf'));
    $router->middleware(new FlashOldData());

    $router->get('/', HomeController::class)->setName('home');

    $router->group('/', function (RouteGroup $route) {
        $route->get('/register', [RegisterController::class, 'registerForm'])->setName('registerForm');
        $route->post('/register', [RegisterController::class, 'register'])->setName('register');
    
        $route->get('/login', [LoginController::class, 'loginForm'])->setName('loginForm');
        $route->post('/login', [LoginController::class, 'login'])->setName('login');
    })
    ->middleware(new RedirectIfAuthenticated());

    $router->group('/', function (RouteGroup $route) {
        $route->get('/dashboard', DashboardController::class)->setName('dashboard');
        $route->post('/logout', LogoutController::class)->setName('logout');;
    })
    ->middleware(new RedirectIfGuest());

    $router->get('/users/{user}', UserController::class)->setName('users.show');
};
