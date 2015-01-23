<?php

namespace Hametuha\HamePub\Oebps;


use Hametuha\HamePub\Definitions\Mime;
use Hametuha\HamePub\Definitions\Schemas;
use Hametuha\HamePub\MetaInf\Prototype;


class Content extends Prototype
{
	/**
	 * @var string
	 */
	protected $extension = 'opf';

	/**
	 * Set identifier
	 *
	 * @param string $urn
	 * @return string ID of identifier
	 */
	public function setIdentifier($urn){
		$identifier = $this->dom->metadata->children('dc', true)->identifier[0];
		$identifier[0][0] = $this->h($urn);
		return $identifier->attributes()->id;
	}

	/**
	 * Set language
	 *
	 * @param string $lang
	 */
	public function setLang($lang){
		$this->dom->metadata->children('dc', true)->language[0][0] = $this->h($lang);
	}

	/**
	 * Add meta item
	 *
	 * @param string $tag
	 * @param string $value
	 * @param array $attributes
	 */
	public function addMeta($tag, $value, array $attributes = []){
		$value = $this->h($value);
		if( false !== strpos($tag, ':') ){
			$tags = explode(':', $tag);
			$node = $this->dom->metadata->addChild($tags[1], $value, Schemas::getUri($tags[0]));
		}else{
			$node = $this->dom->metadata->addChild($tag, $value);
		}
		foreach( $attributes as $key => $val ){
			$node[$key] = $this->h($val);
		}
	}

	/**
	 * Add item to
	 *
	 * @param string $id
	 * @param string $relative_path
	 * @param array $properties Default empty. If set, properties will be set.
	 * @return string
	 */
	public function addItem($id, $relative_path, array $properties = []){
		$item = $this->dom->manifest->addChild('item');
		$item['id'] = $id;
		$item['href'] = $relative_path;
		$item['media-type'] = Mime::getTypeFromPath($relative_path);
		if( $properties ){
			$item['properties'] = implode(' ', $properties);
		}
		return $id;
	}

	/**
	 * Getter
	 *
	 * @param string $name
	 *
	 * @return mixed
	 */
	public function __get( $name ) {
		switch( $name ){
			case 'proper_path':
				return 'OEBPS'.DIRECTORY_SEPARATOR."{$this->name}.{$this->extension}";
				break;
			default:
				return parent::__get( $name );
				break;
		}
	}


}