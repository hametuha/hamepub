<?php

namespace Hametuha\HamePub\Pattern;

/**
 * Singleton Pattern
 *
 * @package Hametuha\HamePub\Pattern
 */
class Singleton
{
    /**
     * @var static[]
     */
    private static $instances = [];

    /**
     * Constructor
     *
     * @param array $settings
     */
    protected function __construct(array $settings = [])
    {
        // Do nothing
    }

    /**
     * Get instance
     *
     * @param array $settings
     *
     * @return static
     */
    public static function get(array $settings = [])
    {
        $class_name = get_called_class();
        if (!isset(self::$instances[$class_name])) {
            self::$instances[$class_name] = new $class_name($settings);
        }
        return self::$instances[$class_name];
    }
}
