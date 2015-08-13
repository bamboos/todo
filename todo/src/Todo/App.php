<?php
/**
 * Test assignment file
 */

namespace ES\Todo;

use ES\Todo\DI\ContainerTrait;

/**
 * Application class
 *
 * Used to handle request and return response
 *
 * @package ES\Todo
 */
class App {

    /**
     * User DI container's methods
     */
    use ContainerTrait;

    /**
     * Request
     * @var null|ES\Todo\DI\Service\Request
     */
    private $request = null;

    /**
     * Request
     * @var null|ES\Todo\DI\Service\Router
     */
    private $router = null;

    /**
	* Handles request with router and dispatches to required action
	*/
	public function __construct()
	{
        $this->request = $this->getService('request');
        $this->router  = $this->getService('router');
	}

    /**
     * Handles request and returns response
     */
    public function handle()
    {
        $dispatchInfo = $this->router->get();
        $this->dispatch($dispatchInfo);
    }


    /**
     * Dispatches to correct controller's method
     *
     * @param $dispatchInfo
     */
    private function dispatch($dispatchInfo)
    {
        $class  = __NAMESPACE__ . '\\Controller\\' . ucfirst($dispatchInfo[1]);
        $method = $dispatchInfo[0] . ucfirst($dispatchInfo[2]);

        $this->setRequestParams(array_splice($dispatchInfo, 3));

        header('Content-Type: application/json');
        echo json_encode((new $class)->$method());
    }

    /**
     * Set request's parameters
     *
     * @param $pairs
     */
    private function setRequestParams($pairs)
    {
        $pairs = count($pairs) % 2 == 0 ? $pairs : array_merge($pairs, [null]);
        $pairsCount = count($pairs) / 2;

        for ($i = 0 ; $i < $pairsCount; $i++) {
            $this->request->setParam($pairs[$i], $pairs[$i + 1]);
        }
    }

    /**
     * Returns request's instance
     *
     * @return ES\Todo\DI\Service\Request|null
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Returns router's instance
     *
     * @return ES\Todo\DI\Service\Router|null
     */
    public function getRouter()
    {
        return $this->router;
    }
}