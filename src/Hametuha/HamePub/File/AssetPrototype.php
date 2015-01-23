<?php

namespace Hametuha\HamePub\File;


use Hametuha\HamePub\Exception\CompileException;
use Hametuha\HamePub\Exception\DuplicateException;
use Hametuha\HamePub\Exception\SettingException;
use Hametuha\HamePub\Oebps\Content;


abstract class AssetPrototype
{

	/**
	 * @var array
	 */
	protected static $ids = [];

	/**
	 * @var string
	 */
	protected $directory = '';

	/**
	 * Copy file
	 *
	 * @param string $id
	 * @param string $src
	 * @param string $dist_name
	 * @return string item's relative path
	 *
	 * @throws DuplicateException
	 * @throws CompileException
	 */
	public function copy($id, $src, $dist_name = ''){
		if( !file_exists($src) ){
			throw new CompileException(sprintf('%s doesn\'t exist.', $src));
		}
		if( !$dist_name ){
			$dist_name = basename($src);
		}
		if( !isset(static::$ids[$id]) ){
			static::$ids[$id] = [];
		}
		if( false !== array_search($dist_name, static::$ids[$id]) ){
			throw new DuplicateException(sprintf('%s is not unique for ePub(%s).', $dist_name, $id));
		}
		static::$ids[$id][] = $dist_name;
		$distributor = Distributor::get($id);
		// Move file
		$rel_path = $this->directory.DIRECTORY_SEPARATOR.$dist_name;
		$distributor->copy($src, $rel_path);
		// Return ID
		return $rel_path;
	}


}
