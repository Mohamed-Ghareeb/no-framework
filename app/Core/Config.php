<?php
namespace App\Core;


class Config 
{
    protected $config = [];

    public function get(string $key, $default = null) 
    {
        return dot($this->config)->get($key) ?? $default;
    }
}
