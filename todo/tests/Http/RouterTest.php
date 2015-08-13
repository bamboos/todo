<?php

class RouterTest extends PHPUnit_Framework_TestCase
{
    private $router = null;

    public function setUp()
    {
        $_SERVER = [
            'REQUEST_URI'    => 'api/todo/id/1',
            'REQUEST_METHOD' => 'get'
        ];

        $this->router = new \ES\Todo\Http\Router();
    }

    public function testGetDispatchInfo()
    {
        $info = $this->router->get();
        $this->assertEquals(5, count($info));
        $this->assertEquals($info[0], 'get');
        $this->assertEquals($info[1], 'api');
        $this->assertEquals($info[2], 'todo');
        $this->assertEquals($info[3], 'id');
        $this->assertEquals($info[4], '1');
    }
}