<?php

use App\Providers\AppServiceProvider;
use App\Providers\ViewServiceProvider;
use App\Providers\RouteServiceProvider;
use App\Providers\RequestServiceProvider;

return [
    'name' => env('APP_NAME'),

    'debug' => env('APP_DEBUG'),

    'providers' => [
        AppServiceProvider::class,
        RequestServiceProvider::class,
        RouteServiceProvider::class,
        ViewServiceProvider::class,
    ],
];