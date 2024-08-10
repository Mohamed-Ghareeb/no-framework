<?php

namespace App\Http\Controllers\Auth;

use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Exceptions\ValidatorException;
use Respect\Validation\Validator as v;
class LoginController
{
    public function loginForm()
    {
        return  view('auth/login.twig', [
            'errors' =>  session()->get('errors')[0] ?? null
        ]);
    }

    public function login(ServerRequestInterface $request)
    {
        try {
            v::key('email', v::email()->notEmpty())
                ->key('password', v::notEmpty())
                ->assert($request->getParsedBody());
        } catch (ValidatorException $e) {
            session()->add('errors', $e->getMessages());
            return new RedirectResponse(route('loginForm'));
        }

        if (!auth()->authenticate($request->getParsedBody())) { 
            session()->add('errors', [
                'wrong_credentials' => 'You enter wrong credentials'
            ]);

            return new RedirectResponse(route('loginForm'));
        }

        return new RedirectResponse((route('dashboard')));
    }
}
