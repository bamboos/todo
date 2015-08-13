<?php

class ContainerTraitTest extends PHPUnit_Framework_TestCase
{
    public function testIsServiceRegistered()
    {
        $trait = $this->getObjectForTrait('\\ES\\Todo\\DI\\ContainerTrait');
        $service = $trait->getService('request');

        $this->assertNotNull($service);
    }

    public function testGetService()
    {
        $trait = $this->getObjectForTrait('\\ES\\Todo\\DI\\ContainerTrait');
        $service = $trait->getService('request');

        $this->assertInstanceOf('\\ES\\Todo\\DI\\Service\\Request', $service);
    }
}