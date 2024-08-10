<?php

namespace App\Views;

use App\Config\Config;
use Twig\Extension\AbstractExtension;

class TwigRunTimeExtension extends AbstractExtension
{
    public function config()
    {
        return app(Config::class);
    }

    public function auth()
    {
        return auth();
    }

    public function csrf()
    {
        $guard = app('csrf');
        return
            '
            <input type="hidden" name="' . $guard->getTokenNameKey() . '" value="' . $guard->getTokenName() . '">
            <input type="hidden" name="' . $guard->getTokenValueKey() . '" value="' . $guard->getTokenValue() . '">
            ';
    }

    public function session()
    {
        return session();
    }

    public function old(string $key)
    {
        return $this->session()->peek('old')[$key] ?? null;
    }

    public function route(string $name, array $arguments = [])
    {
        return route($name, $arguments);
    }
}
