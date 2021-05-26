<?php

namespace Hametuha\HamePub;
use Hametuha\HamePub\File\Distributor;

/**
 * Test class
 *
 * @package Hametuha\HamePub
 * @property-read string $id
 * @property-read string $tmp_dir
 * @property-read string $asset_dir
 * @property-read string $base_dir
 * @property-read string $epub_dir
 */
abstract class Test extends \PHPUnit_Framework_TestCase
{

	/**
	 * @var string
	 */
	private $id_holder = '';

	/**
	 * @var Distributor
	 */
	protected $distributor = null;

	/**
	 * Set up test stui
	 */
	protected function setUp(){
		// Set distributor
		$this->distributor = Distributor::get($this->id, $this->tmp_dir);
	}

	/**
	 * Remove ePub directory
	 */
	protected function tearDown() {
		$this->removeDirectory($this->epub_dir);
	}

	/**
	 * Remove Directory recursively
	 *
	 * @param string $directory
	 *
	 * @return bool
	 */
	protected function removeDirectory($directory){
		$files = array_diff( scandir($directory), array('.','..') );
		foreach ($files as $file) {
			$path = $directory.DIRECTORY_SEPARATOR.$file;
			is_dir($path) ? $this->removeDirectory($path) : unlink($path);
		}
		return rmdir($directory);
	}


	/**
	 * Getter
	 *
	 * @param string $name
	 *
	 * @return null|string
	 */
	public function __get($name){
		switch( $name ){
			case 'id':
				if( empty($this->id_holder) ){
					$this->id_holder = uniqid('epub-');
				}
				return $this->id_holder;
				break;
			case 'tmp_dir':
				return $this->base_dir.DIRECTORY_SEPARATOR.'tmp';
				break;
			case 'asset_dir':
				return $this->base_dir.DIRECTORY_SEPARATOR.'assets';
				break;
			case 'epub_dir':
				return $this->tmp_dir.DIRECTORY_SEPARATOR.$this->id;
				break;
			case 'base_dir':
				return dirname(dirname(dirname(__DIR__)));
				break;
			default:
				return null;
				break;
		}
	}
}
