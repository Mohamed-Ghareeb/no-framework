<?php

use League\Route\Router;
use Psr\Container\ContainerInterface;
use App\Http\Controllers\HomeController;

return static function(Router $router, ContainerInterface $container)
{
    $router->get('/', HomeController::class);;
};