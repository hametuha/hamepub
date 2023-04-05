<?php

namespace Hametuha\HamePub\Pattern;

use Hametuha\HamePub\File\Distributor;

/**
 * Application Class
 *
 * @package Hametuha\HamePub\Pattern
 * @property-read Distributor $distributor
 */
abstract class Application
{
    /**
     * @var array
     */
    private static $instances = [];

    /**
     * @var string
     */
    protected $id = '';

    /**
     * Constructor
     *
     * @param string $id
     */
    protected function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get remote file
     *
     * @param string $url
     * @param array $context
     *
     * @return string|false
     */
    public function getRemoteFile($url, array $context = [])
    {
        return @file_get_contents($url, false, stream_context_create(array_merge([
            'http' => [
                'timeout' => 10,
            ]
        ], $context)));
    }

    /**
     * Get instance
     *
     * @param string $id
     *
     * @return static
     */
    public static function get($id)
    {
        $class_name = get_called_class();
        if (!isset(self::$instances[$class_name])) {
            self::$instances[$class_name] = [];
        }
        if (!isset(self::$instances[$class_name][$id])) {
            self::$instances[$class_name][$id] = new $class_name($id);
        }
        return self::$instances[$class_name][$id];
    }

    /**
     * Getter
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        switch ($name) {
            case 'distributor':
                return Distributor::get($this->id);
                break;
            default:
                return null;
                break;
        }
    }
}
