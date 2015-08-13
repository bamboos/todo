<?php namespace ES\Todo\DI;

class ProviderImp implements IProvider
{
    private $name = '';
    private $instances = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function provide()
    {
        $name = __NAMESPACE__ . '\\Service\\' . ucfirst($this->name);

        if ($this->name && class_exists($name)) {

            if (!isset($this->instances[$name])) {
                $this->instances[$name] = new $name;
            }

            return $this->instances[$name];
        }

        return null;
    }
}
