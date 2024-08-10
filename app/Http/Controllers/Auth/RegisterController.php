<?php
namespace App\Http\Controllers\Auth;

use Respect\Validation\Validator as v;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\RedirectResponse;
use Respect\Validation\Exceptions\ValidatorException;

class RegisterController 
{
    public function registerForm()
    {
        return view('auth/register.twig', [
            'errors' => session()->get('errors')[0] ?? null
        ]);
    }

    public function register(ServerRequestInterface $request)
    {
        try {
            v::key('first_name', v::alpha()->notEmpty())
            ->key('last_name', v::alpha()->notEmpty())
            ->key('email', v::email()->notEmpty()->not(v::existsInDatabase('users', 'email')))
                ->key('password', v::notEmpty())
                ->assert($request->getParsedBody());
        } catch (ValidatorException $e) {
            session()->add('errors', $e->getMessages());
            return new RedirectResponse(route('registerForm'));
        }
       if($user = auth()->registerAndActivate($request->getParsedBody())) {
            auth()->login($user);
       }
        return new (route('dashboard'));
    }
}
