<?php
namespace App\Http\Controllers;

use App\Config\Config;
use App\Views\View;
use Laminas\Diactoros\Response;


class HomeController 
{
    public function __construct(
        protected Config $config,
        protected View $view,
    ) {}

    public function __invoke()
    {
       var_dump($this->view);
       die();
        $response = new Response();

        $response->getBody()->write($this->config->get('app.name'));

        return $response;   
    }
}
