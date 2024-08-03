<?php
namespace App\Http\Controllers;

use App\Views\View;
use App\Config\Config;
use App\Models\User;
use Laminas\Diactoros\Response;

class HomeController 
{
    public function __construct(
        protected Config $config,
        protected View $view,
    ) {}

    public function __invoke()
    {    
        $response = new Response();

        $response->getBody()->write(
            $this->view->render('home.twig', [
                'users' => User::get()
            ])
        );

        return $response;   
    }
}
