<?php
namespace App\Http\Controllers;

use App\Views\View;
use App\Config\Config;
use Laminas\Diactoros\Response;
use Illuminate\Database\DatabaseManager;

class HomeController 
{
    public function __construct(
        protected Config $config,
        protected View $view,
        protected DatabaseManager $database,
    ) {}

    public function __invoke()
    {    
        $response = new Response();

        $response->getBody()->write(
            $this->view->render('home.twig', [
                'users' => $this->database->table('users')->get()
            ])
        );

        return $response;   
    }
}
