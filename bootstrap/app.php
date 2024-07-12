<?php

use App\Core\App;
use App\Core\Config;
use App\Core\Container;
use App\Providers\AppServiceProvider;
use App\Providers\ConfigServiceProvider;
use League\Container\ReflectionContainer;

require '../vendor/autoload.php';

$container = Container::getInstance();

$container->delegate(new ReflectionContainer());

$container->addServiceProvider(new ConfigServiceProvider());

$container->addServiceProvider(new AppServiceProvider());

var_dump($container->get(Config::class)->get('database.name'));
die();

$app = new App;

$app->run();