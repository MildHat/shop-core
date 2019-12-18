<?php


namespace core;


class Registry
{

    use TSingletone;

    public $properties;

    public function setProperty($key, $value)
    {
        $this->properties[$key] = $value;
        return true;
    }

    public function getProperty($key)
    {
        if (array_key_exists($key, $this->properties)) {
            return $this->properties[$key];
        }
        return false;
    }

    public function getProperties()
    {
        return $this->properties;
    }

}
