<?php

namespace Hametuha\HamePub\MetaInf;


use Hametuha\HamePub\Pattern\Application;


/**
 * Prototype of META-INF/*.xml
 *
 * @package Hametuha\HamePub\MetaInf
 * @property-read string $name
 * @property-read string $skeleton_file
 * @property-read string $proper_path
 * @property-read \SimpleXMLElement $dom
 */
abstract class Prototype extends Application
{
	/**
	 * @var string
	 */
	protected $extension = 'xml';

	/**
	 * @var \SimpleXMLElement
	 */
	private $dom_instance = null;

	/**
	 * Get XML string in pretty format
	 *
	 * @return string
	 */
	public function getXML(){
		$doc = new \DomDocument('1.0');
		$doc->preserveWhiteSpace = false;
		$doc->formatOutput = true;
		$doc->loadXML($this->dom->asXml());
		return $doc->saveXML();
	}

	/**
	 * Put XML file
	 *
	 * @return bool|string
	 */
	public function putXML(){
		$xml = $this->getXML();
		return $this->distributor->write($xml, $this->proper_path);
	}

	/**
	 * Escape string
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	protected function h($string){
		return htmlspecialchars($string, ENT_QUOTES | ENT_XML1, "utf-8");
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
			case 'name':
				$class_name = explode('\\', get_called_class());
				return strtolower($class_name[count($class_name) - 1]);
				break;
			case 'skeleton_file':
				return $this->distributor->path->assets.DIRECTORY_SEPARATOR."{$this->name}.{$this->extension}";
				break;
			case 'dom':
				if( is_null($this->dom_instance) ){
					$this->dom_instance = simplexml_load_file($this->skeleton_file);
				}
				return $this->dom_instance;
				break;
			case 'proper_path':
				return 'META-INF'.DIRECTORY_SEPARATOR."{$this->name}.xml";
				break;
			default:
				return parent::__get($name);
				break;
		}
	}

}