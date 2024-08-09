<?php
namespace App\Http\Controllers\Auth;

use Laminas\Diactoros\Response;
use Cartalyst\Sentinel\Sentinel;
use Laminas\Diactoros\Response\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class LogoutController 
{
    public function __construct(
        protected Sentinel $auth,
        protected Session $session,
    ) {}

    public function __invoke()
    {
        $this->auth->logout();
        $this->session->getFlashBag()->add('message', 'you have been logged out');
        return new RedirectResponse('/');
    }
}
