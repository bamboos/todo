<?php namespace ES\Todo;

/**
 * Test assignment file
 */

use ES\Todo\DI\ContainerTrait;

/**
 * Class App
 * @package ES\Todo
 */
class App {

    use ContainerTrait;

    private $request = null;
    private $router = null;

    /**
	* Constructor
	*/
	public function __construct()
	{
        $this->request = $this->getService('request');
        $this->router  = $this->getService('router');

        $dispatchInfo = $this->router->get();
        $this->dispatch($dispatchInfo);
	}

    private function dispatch($dispatchInfo)
    {
        $class  = __NAMESPACE__ . '\\Controller\\' . ucfirst($dispatchInfo[1]);
        $method = $dispatchInfo[0] . ucfirst($dispatchInfo[2]);

        $this->setRequestParams(array_splice($dispatchInfo, 3));

        header('Content-Type: application/json');
        echo (new $class)->$method();
    }

    private function setRequestParams($pairs)
    {
        $pairs = count($pairs) % 2 == 0 ? $pairs : array_merge($pairs, [null]);
        $pairsCount = count($pairs) / 2;

        for ($i = 0 ; $i < $pairsCount; $i++) {
            $this->request->setParam($pairs[$i], $pairs[$i + 1]);
        }
    }
}