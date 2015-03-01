<?php

namespace Hametuha\HamePub;


use Hametuha\HamePub\Pattern\AbstractFactory;
use Hametuha\HamePub\File\Distributor;
use Hametuha\HamePub\MetaInf\Container;
use Hametuha\HamePub\Parser\HTML5Parser;

/**
 * Factory class
 *
 * @package Hametuha\HamePub
 */
class Factory extends AbstractFactory
{

	/**
	 * @var array
	 */
	public $doms = [];

	/**
	 * Register HTML string
	 *
	 * @param string $id
	 * @param string $html
	 * @param string $linear
	 * @param array $properties
	 * @return false|\DOMDocument
	 */
	public function registerHTML($id, $html, $linear = 'yes', array $properties = []){
		$dom = $this->parser->parseFromString($html);
		if( $dom ){
			$this->doms[$id] = $dom;
			$this->opf->addIdref($id.'.xhtml', $linear, $properties);
			return $dom;
		}
		return false;
	}


	/**
	 * Load from path
	 *
	 * @param string $path
	 * @param array $args
	 * @param string $linear
	 * @param array $properties
	 * @return \DomDocument|false
	 */
	public function includeTemplate($id, $path, array $args = [], $linear = 'yes', array $properties = []){
		if( !file_exists($path) ){
			return false;
		}
		if( !empty($args) ){
			extract($args);
		}
		ob_start();
		include $path;
		$content = ob_get_contents();
		ob_end_clean();
		return $this->registerHTML($id, $content, $linear, $properties);
	}

	/**
	 * Register HTML from file path
	 *
	 * @param string $id
	 * @param string $path
	 *
	 * @return bool
	 */
	public function registerFromPath($id, $path){
		if( !file_exists($path) ){
			return false;
		}
		$dom = $this->parser->parseFromString(file_get_contents($path));
		if( $dom ){
			$this->doms[$id] = $dom;
		}
		return false;
	}

	/**
	 * Get remote file
	 *
	 * @param string $id
	 * @param string $url
	 * @param array $context
	 *
	 * @return bool
	 */
	public function registerFromUrl($id, $url, array $context = []){
		$response = $this->parser->getRemoteFile($url, $context);
		if( $response && ($dom = $this->parser->parseFromString($response)) ){
			$this->doms[$id] = $dom;
		}
		return false;
	}

}
