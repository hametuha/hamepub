<?php

namespace Hametuha\HamePub\File;


use Hametuha\HamePub\Pattern\Singleton;

/**
 * Path info
 *
 * @package Hametuha\HamePub
 * @property-read string $assets Assets directory path
 * @property-read string $skeleton Skeleton ePub path.
 */
class Path extends Singleton
{

	/**
	 * Getter
	 *
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function __get($name){
		switch( $name ){
			case 'assets':
				return dirname(__DIR__).DIRECTORY_SEPARATOR.'assets';
				break;
			case 'skeleton':
				return $this->assets.DIRECTORY_SEPARATOR.'skeleton.epub';
				break;
			default:
				return null;
				break;
		}
	}
}
