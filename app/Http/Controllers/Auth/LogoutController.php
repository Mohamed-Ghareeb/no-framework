<?php
namespace App\Http\Controllers\Auth;

use Laminas\Diactoros\Response\RedirectResponse;
class LogoutController 
{
    public function __invoke()
    {
        auth()->logout();
        session()->add('message', 'you have been logged out');
        return new RedirectResponse(route('home'));
    }
}
