<?php

namespace Hametuha\HamePub\Oebps;


use Hametuha\HamePub\Definitions\Mime;
use Hametuha\HamePub\Definitions\Schemas;
use Hametuha\HamePub\MetaInf\Prototype;

/**
 * Content.opf file interface
 *
 * @package Hametuha\HamePub\Oebps
 *
 * @property string $direction
 */
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
		$identifier[0] = $this->h($urn);
		return $identifier->attributes()->id;
	}

	/**
	 * Set language
	 *
	 * @param string $lang_code
	 * @return \SimpleXMLElement
	 */
	public function setLang($lang_code){
		$lang = $this->dom->metadata->children('dc', true)->lang[0];
		$lang[0] = $this->h($lang_code);
		return $lang[0];
	}

	/**
	 * Set title meta
	 *
	 * @param string $string
	 * @param string $id
	 * @param string $type 1 of 'main', 'subtitle', 'short', 'collection', 'edition' and 'expanded'
	 * @param int $sequence
	 */
	public function setTitle($string, $id, $type = 'main', $sequence = 1){
		$sequence = max(1, $sequence);
		// Add title
		$title = $this->dom->metadata->addChild('title', $this->h($string), Schemas::DC);
		$title['id'] = $id;
		// Add title meta
		$meta = $this->dom->metadata->addChild('meta', $type);
		$meta['refines'] = '#'.$id;
		$meta['property'] = 'title-type';
		// Add sequence
		$meta = $this->dom->metadata->addChild('meta', $sequence);
		$meta['refines'] = '#'.$id;
		$meta['property'] = 'display-seq';
	}

	/**
	 * Add modified date
	 *
	 * @param int $timestamp UTC timestamp
	 */
	public function setModifiedDate($timestamp){
		$this->addMeta('meta', date('Y-m-d\TH:i:s\Z', $timestamp), [
			'property' => 'dcterms:modified',
		]);
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
	 * @param string $relative_path
	 * @param string $id If empty, path will convert to id
	 * @param array $properties Default empty. If set, properties will be set.
	 * @return string
	 */
	public function addItem($relative_path, $id = '', array $properties = []){
		$item = $this->dom->manifest->addChild('item');
		$item['id'] = $id ?: $this->pathToId($relative_path);
		$item['href'] = $relative_path;
		$item['media-type'] = Mime::getTypeFromPath($relative_path);
		if( $properties ){
			$item['properties'] = implode(' ', $properties);
		}
		return $id;
	}

	/**
	 * Add item ref to spine
	 *
	 * @param string $id
	 * @param string $liner
	 * @param array $properties List of property. 'page-spread-left' or 'page-spread-right' is allowed.
	 *
	 * @return mixed
	 */
	public function addIdref($id, $liner = 'yes', array $properties = [] ){
		$itemref = $this->dom->spine->addChild('itemref');
		$itemref['idref'] = $id;
		if( 'no' === $liner ){
			$itemref['linear'] = 'no';
		}
		if( !empty($properties) ){
			$itemref['properties'] = implode(' ', $properties);
		}
		return $itemref;
	}

	/**
	 * Convert id to path
	 *
	 * @param string $path
	 *
	 * @return string
	 */
	public function pathToId($path){
		$path = ltrim(ltrim($path, '.'), DIRECTORY_SEPARATOR);
		return strtolower(preg_replace('/[_\.\/\\\\]/', '-', $path));
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
			case 'direction':
				$attr = $this->dom->spine[0]->attributes();
				return (string)( isset($attr['page-progression-direction']) ? $attr['page-progression-direction'] : '' );
				break;
			default:
				return parent::__get( $name );
				break;
		}
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 */
	public function __set($name, $value){
		switch( $name ){
			case 'direction':
				switch( $value ){
					case 'ltr':
					case 'rtl':
						// $value is as is
						break;
					default:
						$value = 'default';
						break;
				}
				$this->dom->spine[0]['page-progression-direction'] = $value;
				break;
			default:
				// Do nothing.
				break;
		}
	}
}
