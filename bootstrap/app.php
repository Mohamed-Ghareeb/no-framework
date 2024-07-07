<?php

use App\Core\App;
use App\Core\Container;
use App\Providers\AppServiceProvider;
use League\Container\ReflectionContainer;

require '../vendor/autoload.php';

$container = Container::getInstance();

$container->delegate(new ReflectionContainer());

$container->addServiceProvider(new AppServiceProvider());

$app = new App;

$app->run();