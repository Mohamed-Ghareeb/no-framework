<?php
namespace App\Exceptions;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ExceptionHandler
{
    public function handle(ServerRequestInterface $request, ResponseInterface $response, \Throwable $e)
    {
        if($view = $this->getErrorView($e)) {
            $response->getBody()->write($view);
            return $response;
        }
        throw $e;
    }

    public function getErrorView(\Throwable $e) 
    {
        if(!method_exists($e, 'getStatusCode')) {
            return null;
        }
        
        $view = 'errors/' . $e->getStatusCode() . '.twig';

        if(!view($view)) {
            return null;
        }

        return view($view);
    }
}
