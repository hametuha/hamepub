<?php

namespace Hametuha\HamePub\Pattern;

/**
 * Singleton Pattern
 *
 * @package Hametuha\HamePub\Pattern
 */
abstract class Singleton
{
    /**
     * @var static[]
     */
    private static $instances = [];

    /**
     * Constructor
     *
     */
    protected function __construct()
    {
        $this->init();
    }

    /**
     * Executed in constructor.
     *
     * @return void
     */
    protected function init()
    {
        // Do something.
    }

    /**
     * Get instance
     *
     * @return static
     */
    public static function get()
    {
        $class_name = get_called_class();
        if (!isset(self::$instances[$class_name])) {
            self::$instances[$class_name] = new $class_name();
        }
        return self::$instances[$class_name];
    }
}
