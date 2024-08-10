<?php

namespace App\Providers;

use App\Views\View;
use Twig\Environment;
use App\Config\Config;
use App\Views\TwigExtension;
use App\Views\TwigRunTimeLoader;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ViewServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
        $this->container->add(View::class, function () {
            $loader = new FilesystemLoader(__DIR__ . '/../../resources/views');
            $twig = new Environment($loader, [
                'cache' => false,
                'debug' => config('app.debug')
            ]);

            $twig->addRuntimeLoader(new TwigRunTimeLoader($this->getContainer()));
            $twig->addExtension(new TwigExtension());
            $twig->addExtension(new DebugExtension());
            return new View($twig);
        });
    }

    public function register(): void
    {
 
    }

    public function provides(string $id): bool
    {
        $services = [
            View::class
        ];

        return in_array($id, $services);
    }
}
