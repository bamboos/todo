<?php namespace ES\Todo\DI;

use ES\Todo\DI\Provider;

trait ContainerTrait
{
    private $services = null;

    public function getService($name)
    {
        if ($this->services === null) {
            $this->registerServices();
        }

        if (in_array($name, $this->services)) {
            $providerName = __NAMESPACE__ . '\\Provider\\' . ucfirst($name);

            if (!isset(Container::$providers[$providerName])) {
                Container::$providers[$providerName] = new $providerName($name);;
            }

            return Container::$providers[$providerName]->provide();
        }
    }

    private function registerServices()
    {
        $this->services = [
            'request',
            'router'
        ];
    }
}