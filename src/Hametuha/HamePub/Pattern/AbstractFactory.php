<?php

namespace Hametuha\HamePub\Pattern;

use Hametuha\HamePub\Exception\EnvironmentException;
use Hametuha\HamePub\Exception\SettingException;
use Hametuha\HamePub\File\Distributor;
use Hametuha\HamePub\MetaInf\Container;
use Hametuha\HamePub\Oebps\Content;
use Hametuha\HamePub\Oebps\Toc;
use Hametuha\HamePub\Parser\HTML5Parser;

/**
 * Factory class
 *
 * @package Hametuha\HamePub
 * @property-read Container $container
 * @property-read Distributor $distributor
 * @property-read HTML5Parser $parser
 * @property-read Content $opf
 * @property-read Toc $toc
 */
abstract class AbstractFactory
{
    /**
     * @var array
     */
    protected static $ids = [];

    /**
     * @var string
     */
    private $id = '';


    /**
     * Constructor
     *
     * @param string $id
     * @param string $temp_dir
     *
     * @throws EnvironmentException
     * @throws SettingException
     */
    protected function __construct($id, $temp_dir = '')
    {
        $this->id = $id;
        Distributor::get($id, $temp_dir);
    }

    /**
     * Initialize factory
     *
     * @param $id
     * @param string $temp_dir
     *
     * @return static
     * @throws EnvironmentException
     * @throws SettingException
     */
    public static function init($id, $temp_dir = '')
    {
        if (!preg_match('/\A[a-zA-Z0-9\-_\.]+\z/', $id)) {
            throw new SettingException(sprintf('ID %s should be ready for directory name.', $id));
        }
        // Check ZipArchive
        if (!class_exists('ZipArchive')) {
            throw new EnvironmentException('Class ZipArchive doesn\'t exist.');
        }
        if (!isset(static::$ids[$id])) {
            static::$ids[$id] = new static($id, $temp_dir);
        }
        return static::$ids[$id];
    }

    /**
     * Compile ePub
     *
     * @param string $to Destination
     */
    public function compile($to)
    {
        $this->distributor->compile($to);
    }


    /**
     * @param string $name
     *
     * @return mixed|null
     * @throws SettingException
     */
    public function __get($name)
    {
        switch ($name) {
            case 'container':
                $class_name = 'Hametuha\\HamePub\\MetaInf\\' . ucfirst($name);
                return $class_name::get($this->id);
                break;
            case 'parser':
                return HTML5Parser::get($this->id);
                break;
            case 'opf':
                return Content::get($this->id);
                break;
            case 'toc':
                return Toc::get($this->id) ?: Toc::init($this->id, 'Index');
                break;
            case 'distributor':
                return Distributor::get($this->id);
                break;
            default:
                return null;
                break;
        }
    }
}
