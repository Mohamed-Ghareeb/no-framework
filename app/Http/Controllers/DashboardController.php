<?php
namespace App\Http\Controllers;

use App\Views\View;
use Laminas\Diactoros\Response;
use Cartalyst\Sentinel\Sentinel;

class DashboardController 
{
    public function __construct(
        protected View $view,
        protected Sentinel $auth,
    ) {}

    public function __invoke()
    {
        $response = new Response();

        $response->getBody()->write(
            $this->view->render('dashboard.twig')
        );

        return $response;   
    }
}
