<?php

namespace Hametuha\HamePub;


use Hametuha\HamePub\Exception\EnvironmentException;
use Hametuha\HamePub\Exception\SettingException;
use Hametuha\HamePub\File\Distributor;
use Hametuha\HamePub\MetaInf\Container;

/**
 * Factory class
 *
 * @package Hametuha\HamePub
 * @property-read Container $container
 * @property-read Distributor $distributor
 */
class Factory
{

	/**
	 * @var array
	 */
	private static $ids = [];

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
	public function __construct($id, $temp_dir = ''){
		if( false !== array_search($id, self::$ids) ){
			throw new SettingException(sprintf('ID %s has already been initialized and is not unique.', $id));
		}
		if( !preg_match('/\A[a-zA-Z0-9\-_\.]+\z/', $id) ){
			throw new SettingException(sprintf('ID %s should be ready for directory name.', $id));
		}
		$this->id = $id;
		self::$ids[] = $id;
		Distributor::get($id, $temp_dir);
		// Check ZipArchive
		if( !class_exists('ZipArchive') ){
			throw new EnvironmentException('Class ZipArchive doesn\'t exist.');
		}
	}

	/**
	 * @param string $name
	 *
	 * @return mixed|null
	 * @throws SettingException
	 */
	public function __get($name){
		switch( $name ){
			case 'container':
				$class_name = ucfirst($name);
				return $class_name::get($this->id);
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
