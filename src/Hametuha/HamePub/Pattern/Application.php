<?php

namespace Hametuha\HamePub\Pattern;


use Hametuha\HamePub\Distributor;

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
	protected function __construct($id){
		$this->id = $id;
	}

	/**
	 * Get instance
	 *
	 * @param string $id
	 *
	 * @return static
	 */
	public static function get($id){
		if( !isset(static::$instances[$id]) ){
			static::$instances[$id] = new static($id);
		}
		return static::$instances[$id];
	}

	/**
	 * Getter
	 *
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function __get($name){
		switch( $name ){
			case 'distributor':
				return Distributor::get($this->id);
				break;
			default:
				return null;
				break;
		}
	}
}
