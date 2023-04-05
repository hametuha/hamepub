<?php

namespace Hametuha\HamePub\Definitions;

/**
 * Prototype for definition
 *
 * @package Hametuha\HamePub\Definitions
 */
abstract class Prototype
{
    /**
     * Schema name to override
     *
     * @var string
     */
    protected static $schema = '';


    /**
     * Disabled constructor
     */
    private function __construct()
    {
    }

    /**
     * Get schema name
     *
     * @return string
     */
    public static function getSchema()
    {
        return static::$schema;
    }

    /**
     * Get all defiened constants
     *
     * @return array
     */
    public static function getAllConstants()
    {
        $refl = new \ReflectionClass(get_called_class());
        return $refl->getConstants();
    }
}
