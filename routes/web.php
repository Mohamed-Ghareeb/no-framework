<?php

use League\Route\Router;
use Psr\Container\ContainerInterface;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfGuest;
use League\Route\RouteGroup;

return static function (Router $router, ContainerInterface $container) {
    $router->middleware($container->get('csrf'));

    $router->get('/', HomeController::class);

    $router->group('/', function (RouteGroup $route) {
        $route->get('/register', [RegisterController::class, 'registerForm'])
            ->middleware(new RedirectIfAuthenticated());
        $route->post('/register', [RegisterController::class, 'register']);
    
        $route->get('/login', [LoginController::class, 'loginForm']);
        $route->post('/login', [LoginController::class, 'login']);
    })
    ->middleware(new RedirectIfAuthenticated());

    $router->group('/', function (RouteGroup $route) {
        $route->get('/dashboard', DashboardController::class)
            ->middleware(new RedirectIfGuest());
        $route->post('/logout', LogoutController::class);
    })
    ->middleware(new RedirectIfGuest());

    $router->get('/users/{user}', UserController::class);
};
