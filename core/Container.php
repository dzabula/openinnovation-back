<?php

namespace core;

// store the class name in its fields and create instances of them as needed and return them to the call
class Container
{
    private static $instances = [];

    public static function register($key, $instance)
    {
        self::$instances[$key] = $instance;
    }

    public static function resolve($key)
    {
        if (array_key_exists($key, self::$instances)) {
            $instance = self::$instances[$key];

            if (is_callable($instance)) {
                return $instance();
            } else {
                return new $instance();
            }
        }

        throw new \Exception("Dependency not registered: $key");
    }
}