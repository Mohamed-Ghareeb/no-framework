<?php
namespace App\Validation\Exceptions;

use League\Route\Http\Exception;

class CsrfTokensException extends Exception
{
    public function __construct(string $message = 'CSRF Tokens Not Match', ?Exception $previous = null, int $code = 0)
    {
        parent::__construct(422, $message, $previous, [], $code);
    }
}
