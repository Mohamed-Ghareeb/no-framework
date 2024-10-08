<?php
namespace App\Core;

use League\Container\Container as MainContainer;

class Container 
{
    protected static $instance;

    public static function getInstance()
    {
        if(is_null(static::$instance)) {
            static::$instance = new MainContainer();
        }

        return static::$instance;
    }
    
}
