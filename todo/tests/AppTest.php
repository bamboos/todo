<?php

class AppTest extends PHPUnit_Framework_TestCase
{
    private $app = null;

    public function setUp()
    {
        $stubRouterProvider = $this->getMockBuilder('\\ES\\Todo\\DI\\Provider\\Router')
            ->disableOriginalConstructor()
            ->setMethods(array('provide'))
            ->getMock();

        $stubRouter = $this->getMockBuilder('\\ES\\Todo\\DI\\Service\\Router')
            ->disableOriginalConstructor()
            ->getMock();

        $stubRouter->method('get')->willReturn(['get', 'api', 'todo', 'id', '1']);

        $stubRouterProvider->method('provide')->willReturn($stubRouter);

        \ES\Todo\DI\Container::$providers['router'] = $stubRouterProvider;

        $this->app = new \ES\Todo\App();
    }

    public function testConstructor()
    {
        $this->assertNotNull($this->app->getRequest());
        $this->assertNotNull($this->app->getRouter());
    }

    /**
     * @runInSeparateProcess
     */
    public function testIsCorrectRequestParams()
    {
        ob_start();
            $this->app->handle();
        ob_end_clean();

        $this->assertEquals(1, $this->app->getRequest()->getParam('id'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testDispatchRequest()
    {
        ob_start();
            $this->app->handle();
            $contents = ob_get_contents();
        ob_end_clean();

        $this->assertNotEmpty($contents);
    }
}