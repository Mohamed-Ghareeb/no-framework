<?php
namespace App\Http\Controllers;

use App\Models\User;
class HomeController 
{
    public function __invoke()
    {    
        return view('home.twig', [
            'users' => User::paginate(2),
        ]);
    }
}
