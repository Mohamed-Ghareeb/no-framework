<?php

use League\Route\Router;
use Laminas\Diactoros\Response;
use Psr\Container\ContainerInterface;

return static function(Router $router, ContainerInterface $container)
{

    $router->get('/', function () {
        $response = new Response();

        $response->getBody()->write('Home');

        return $response;
    });

    // var_dump('routes');
    
    // die();
};