<?php

namespace App\Views;

use Psr\Container\ContainerInterface;
use Twig\RuntimeLoader\RuntimeLoaderInterface;

class TwigRunTimeLoader implements RuntimeLoaderInterface
{
    public function __construct(protected ContainerInterface $container) {}
    
    public function load(string $class)
    {
        if ($class === TwigRunTimeExtension::class) {
            return new $class($this->container);
        }
    }
}
