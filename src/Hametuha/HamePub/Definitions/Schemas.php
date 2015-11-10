<?php

namespace Hametuha\HamePub\Definitions;


class Schemas
{

	const DC = 'http://purl.org/dc/elements/1.1/';

	const XML = 'http://www.w3.org/1999/xhtml';

	const EPUB = 'http://www.idpf.org/2007/ops';

	const SSML = 'http://www.w3.org/2001/10/synthesis';

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