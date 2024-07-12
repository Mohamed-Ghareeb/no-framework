<?php

use App\Core\App;
use App\Core\Config;
use App\Core\Container;
use App\Providers\ConfigServiceProvider;
use Dotenv\Dotenv;
use League\Container\ReflectionContainer;

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



$app = new App;

$app->run();