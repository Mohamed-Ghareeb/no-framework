<?php

namespace App\Http\Controllers;

use App\Models\User;
use Psr\Http\Message\ServerRequestInterface;
class UserController
{
    public function __invoke(ServerRequestInterface $request, array $arguments)
    {
        return view('user.twig', [
            'user' => User::findOrFail($arguments['user'])
        ]);
    }
}
