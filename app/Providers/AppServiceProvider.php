<?php

namespace App\Providers;

use App\Config\Config;
use App\Views\View;
use Illuminate\Pagination\Paginator;
use Laminas\Diactoros\Request;
use Spatie\Ignition\Ignition;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Respect\Validation\Factory;

class AppServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
        if(config('app.debug')) {
            Ignition::make()->register();
        }

        Factory::setDefaultInstance(
            (new Factory())
            ->withRuleNamespace('App\\Validation\\Rules')
            ->withExceptionNamespace('App\\Validation\\Exceptions')
        );

        Paginator::currentPathResolver(function() {
            return strtok(app(Request::class)->getUri(), '?');
        });

        Paginator::queryStringResolver(function() {
            return app(Request::class)->getQueryParams();
        });

        Paginator::currentPageResolver(function($pageName = 'page') {
            return app(Request::class)->getQueryParams()[$pageName] ?? 1;
        });

        Paginator::viewFactoryResolver(function() {
            return app(View::class);
        });

        Paginator::defaultView('pagination/default.twig');
    }

    public function register(): void
    {
 
    }

    public function provides(string $id): bool
    {
        $services = [

        ];

        return in_array($id, $services);
    }
}
