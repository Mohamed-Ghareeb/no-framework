<?php

use App\Core\App;
use App\Core\Example;
use Spatie\Ignition\Ignition;
use League\Container\Container;
use App\Providers\AppServiceProvider;
use League\Container\ReflectionContainer;

require '../vendor/autoload.php';

$container = new Container();

$container->delegate(new ReflectionContainer());

$container->addServiceProvider(new AppServiceProvider());

var_dump($container->get(Example::class));
die();

$app = new App;



$app->run();