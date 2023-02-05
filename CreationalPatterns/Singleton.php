<?php

class Singleton
{
    private static $instance;

    private function __construct()
    {
        // Private constructor to prevent direct instantiation
    }

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __clone()
    {
        // Private clone method to prevent cloning of the instance
    }

    private function __wakeup()
    {
        // Private __wakeup method to prevent unserialization of the instance
    }
}

try{
    $singleton = Singleton::getInstance();
}catch(exception $e){
    echo $e->getMessage();
}
