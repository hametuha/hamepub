<?php

namespace Hametuha\HamePub\Definitions;


class Schemas
{

	const DC = 'http://purl.org/dc/elements/1.1/';


	/**
	 * Get name space URL
	 *
	 * @param string $name_space
	 *
	 * @return mixed|string
	 */
	public static function getUri($name_space){
		$refl = new \ReflectionClass(get_called_class());
		$name_space = strtoupper($name_space);
		return $refl->hasConstant($name_space)
			? $refl->getConstant($name_space)
			: '';
	}
}