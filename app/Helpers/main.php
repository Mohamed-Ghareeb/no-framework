<?php

use App\Views\View;
use App\Config\Config;
use App\Core\Container;
use League\Route\Router;
use Laminas\Diactoros\Response;
use Cartalyst\Sentinel\Sentinel;
use Symfony\Component\HttpFoundation\Session\Session;

function app(string $class)
{
    return Container::getInstance()->get($class);    
}

function auth()
{
    return app(Sentinel::class);
}

function view(string $view, array $data = [])
{
    $response = new Response();

    $response->getBody()->write(
        app(View::class)->render($view, $data)
    );

    return $response;   
}

function config(string $key, $default = null)
{
    return app(Config::class)->get($key, $default);
}

function session()
{
    return app(Session::class)->getFlashBag();
}

function route(string $name, array $arguments = [])
{
    return app(Router::class)->getNamedRoute($name)->getPath($arguments);
}