<?php

use App\Core\App;
use Spatie\Ignition\Ignition;
use League\Container\Container;
use App\Providers\AppServiceProvider;

require '../vendor/autoload.php';

$container = new Container();

$container->addServiceProvider(new AppServiceProvider());

var_dump($container->get('name'));
die();

$app = new App;



$app->run();