<?php

namespace App\Providers;

use Spatie\Ignition\Ignition;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class AppServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
        Ignition::make()->register();
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
