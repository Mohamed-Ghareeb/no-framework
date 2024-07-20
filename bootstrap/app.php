<?php

use App\Core\App;
use Dotenv\Dotenv;
use App\Core\Config;
use App\Core\Container;
use League\Route\Router;
use Laminas\Diactoros\Request;
use Laminas\Diactoros\Response;
use App\Providers\ConfigServiceProvider;
use League\Container\ReflectionContainer;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

error_reporting(0);

require '../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');

$dotenv->load();

$container = Container::getInstance();

$container->delegate(new ReflectionContainer());

$container->addServiceProvider(new ConfigServiceProvider());

$config = $container->get(Config::class);

foreach ($config->get('app.providers') as $provider) {
    $container->addServiceProvider(new $provider);
}


$app = new App($container);

(require('../routes/web.php'))($app->getRouter(), $container);

$app->run();