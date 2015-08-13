<?php

class ApiTest extends PHPUnit_Framework_TestCase
{
    private $api = null;

    public function setUp()
    {
        $stubRequestProvider = $this->getMockBuilder('\\ES\\Todo\\DI\\Provider\\Request')
            ->disableOriginalConstructor()
            ->setMethods(array('provide'))
            ->getMock();

        $stubRequest = $this->getMockBuilder('\\ES\\Todo\\DI\\Service\\Request')
            ->disableOriginalConstructor()
            ->getMock();

        $stubRequest->method('getParam')->willReturn('11');

        $stubRequestProvider->method('provide')->willReturn($stubRequest);

        \ES\Todo\DI\Container::$providers['request'] = $stubRequestProvider;

        $this->api = new \ES\Todo\Controller\Api();
    }

    public function testGetTodo()
    {
        $result = $this->api->getTodo();

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals($result['id'], '11');
    }

    public function testDeleteTodo()
    {
        $result = $this->api->deleteTodo();

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals($result['id'], '11');
    }

    public function testPostTodo()
    {
        $result = $this->api->postTodo();

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals($result['id'], 'new-id');
    }

    public function testPutTodo()
    {
        $result = $this->api->putTodo();

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals($result['id'], '11');
    }
}