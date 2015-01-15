<?php

namespace Hametuha\HamePub;


use Hametuha\HamePub\Exception\EnvironmentException;
use Hametuha\HamePub\Exception\SettingException;
use Hametuha\HamePub\Pattern\Singleton;

/**
 * File Distributor
 *
 * @package Hametuha\HamePub
 * @property-read Path $path
 */
class Distributor
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
	 * @var string
	 */
	protected $temp_dir = '';

	/**
	 * Get instance
	 *
	 * @param string $id
	 * @param string $temp_dir
	 *
	 * @return mixed
	 * @throws SettingException
	 */
	public static function get($id, $temp_dir = ''){
		if( !isset(self::$instances[$id]) ){
			self::$instances[$id] = new static($id, $temp_dir);
		}
		return self::$instances[$id];
	}

	/**
	 * Constructor
	 *
	 * @param string $id
	 * @param string $temp_dir
	 *
	 * @throws EnvironmentException
	 */
	private function __construct($id, $temp_dir = ''){
		if( !$temp_dir ){
			$temp_dir = sys_get_temp_dir();
		}
		$this->id = $id;
		$this->temp_dir = $temp_dir.DIRECTORY_SEPARATOR.$id;
		// Check directory existence
		if( !is_dir($this->temp_dir) ){
			if( !mkdir($this->temp_dir, 0755, true) ){
				throw new EnvironmentException(sprintf('Cannot make temp directory: %s', $this->temp_dir), 403);
			}
		}
		// Check directory permission
		if( !is_writable($this->temp_dir) ){
			throw new EnvironmentException(sprintf('Directory %s is not writable.', $this->temp_dir), 403);
		}
	}

	/**
	 * Copy file
	 *
	 * @param string $src
	 * @param string $rel_path
	 *
	 * @return bool
	 */
	public function copy($src, $rel_path){
		$path = $this->setDir($rel_path);
		if( !($exist = file_exists($src)) ){
			trigger_error(sprintf('File %s doesn\'t exist.', $src), E_USER_WARNING);
		}
		return $path && $exist && copy($src, $rel_path);
	}

	/**
	 * Write string to file
	 *
	 * @param string $file_content File contents.
	 * @param string $rel_path Relative path from temp directory.
	 *
	 * @return bool
	 */
	public function write($file_content, $rel_path){
		$path = $this->setDir($rel_path);
		return $path && file_put_contents($path, $file_content);
	}

	/**
	 * Ensure parent directory is ready and writable
	 *
	 * @param string $rel_path
	 *
	 * @return false|string
	 */
	private function setDir($rel_path){
		$path = $this->temp_dir.DIRECTORY_SEPARATOR.ltrim($rel_path, DIRECTORY_SEPARATOR);
		$dir = dirname($path);
		if( !is_dir($dir) ){
			if( !mkdir($dir, 0755, true) ){
				return false;
			}
		}
		return $path;
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
			case 'path':
				return Path::get();
				break;
			default:
				return null;
				break;
		}
	}

}