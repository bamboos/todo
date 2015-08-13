<?php namespace ES\Todo\Http;

use ES\Todo\DI\ContainerTrait;

class Router
{
    use ContainerTrait;

    private $uri    = '';
    private $method = '';

    public function __construct()
    {
        $this->uri    = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function get()
    {
        $parts  = explode('/', trim($this->uri, '/'));
        $method = strtolower($this->method);

        return array_merge([
            $method,
            @$parts[0] ?: 'index',
            @$parts[1] ?: 'index'
        ], array_slice($parts, 2));
    }
}