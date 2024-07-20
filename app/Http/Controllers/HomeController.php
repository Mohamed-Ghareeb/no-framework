<?php
namespace App\Http\Controllers;

use Laminas\Diactoros\Response;


class HomeController 
{
    public function __invoke()
    {
        $response = new Response();

        $response->getBody()->write('Home');

        return $response;   
    }
}
