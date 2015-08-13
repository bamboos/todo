<?php

class ProviderImpTest extends PHPUnit_Framework_TestCase
{
    public function testName()
    {
        $provider = new \ES\Todo\DI\ProviderImp('request');
        $instance = $provider->provide();

        $this->assertNotNull($instance);
    }
    
    public function testServiceInstance()
    {
        $provider = new \ES\Todo\DI\ProviderImp('request');
        $instance = $provider->provide();

        $this->assertInstanceOf('\\ES\\Todo\\DI\\Service\\Request', $instance);
    }
}