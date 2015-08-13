<?php

class RequestTest extends PHPUnit_Framework_TestCase
{
    private $request = null;

    public function setUp()
    {
        $_REQUEST = [
            'param1' => 'value1',
            'param2' => 'value2'
        ];

        $this->request = new \ES\Todo\Http\Request();
    }

    public function testConstructorParams()
    {
        $value = $this->request->getParam('param1');
        $this->assertEquals('value1', $value);

        $value = $this->request->getParam('param2');
        $this->assertEquals('value2', $value);

        $value = $this->request->getParam('param3');
        $this->assertNull($value);

        $value = $this->request->getParam('param3', 'value3');
        $this->assertEquals('value3', $value);

        $value = $this->request->getParam('param2', 'value3');
        $this->assertEquals('value2', $value);
    }
}