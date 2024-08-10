<?php

namespace App\Providers;

use App\Validation\Exceptions\CsrfTokensException;
use Laminas\Diactoros\ResponseFactory;
use Slim\Csrf\Guard;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class CsrfServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {

    }

    public function register(): void
    {
        $this->getContainer()->add('csrf', function () {
            $guard = new Guard(new ResponseFactory());

            $guard->setFailureHandler(function () {
                throw new CsrfTokensException();
            });

            return $guard;
        })
        ->setShared(true);
    }

    public function provides(string $id): bool
    {
        $services = [
            'csrf'
        ];

        return in_array($id, $services);
    }
}
