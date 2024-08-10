<?php

namespace App\Views;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('config', [TwigRunTimeExtension::class, 'config']),
            new TwigFunction('auth', [TwigRunTimeExtension::class, 'auth']),
            new TwigFunction('csrf', [TwigRunTimeExtension::class, 'csrf']),
            new TwigFunction('session', [TwigRunTimeExtension::class, 'session']),
            new TwigFunction('old', [TwigRunTimeExtension::class, 'old']),
        ];
    }
}
