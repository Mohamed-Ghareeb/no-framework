<?php

use App\Core\App;
use Spatie\Ignition\Ignition;

require '../vendor/autoload.php';

Ignition::make()->register();

$app = new App;



$app->run();