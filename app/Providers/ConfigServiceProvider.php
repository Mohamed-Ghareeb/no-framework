<?php

namespace App\Providers;

use App\Core\Config;
use Spatie\Ignition\Ignition;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ConfigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $this->getContainer()->add(Config::class, function () {
            return new Config();
        });
    }

    public function provides(string $id): bool
    {
        $services = [
            Config::class
        ];

        return in_array($id, $services);
    }
}
