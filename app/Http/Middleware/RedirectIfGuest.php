<?php

namespace App\Http\Middleware;

use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RedirectIfGuest implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if(!auth()->check()) {
            session()->add('message', 'Log in before access this page.');
            return new RedirectResponse(route('loginForm'));
        }
        return $handler->handle($request);
    }
}
