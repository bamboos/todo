<?php namespace ES\Todo\Http;

class Request
{
    private $params = [];

    public function __construct()
    {
        $this->params = $_REQUEST;
    }

    public function getParam($name, $default = null)
    {
        return @$this->params[$name] ?: $default;
    }

    public function setParam($name, $value)
    {
        $this->params[$name] = $value;
    }
}
