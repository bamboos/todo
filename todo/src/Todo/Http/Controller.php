<?php namespace ES\Todo\Http;

use ES\Todo\DI\ContainerTrait;

class Controller
{
    protected $request = null;
    use ContainerTrait;

    public function __construct()
    {
        $this->request = $this->getService('request');
    }
}