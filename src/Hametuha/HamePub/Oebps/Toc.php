<?php

namespace Hametuha\HamePub\Oebps;


use Hametuha\HamePub\Pattern\Application;



class Toc
{

	/**
	 * @var array
	 */
	private static $instances = [];

	/**
	 * @var string
	 */
	protected $label = '';

	/**
	 * @var string
	 */
	protected $link = '';

	/**
	 * @var bool
	 */
	protected $root = true;

	/**
	 * Children storage
	 *
	 * @var array
	 */
	public $children = [];

	/**
	 * Add children
	 *
	 * @param string $label
	 * @param string $link
	 * @param bool $root
	 */
	private function __construct($label, $link = '', $root = false){
		$this->label = $label;
		$this->link = $link;
		$this->root = $root;
	}

	/**
	 * Add child
	 *
	 * @param string $label
	 * @param string $link
	 */
	public function addChild($label, $link){
		$this->children[$label] = new Toc($label, $link);
	}

	/**
	 * Get simple navigation
	 *
	 * @param string $header
	 * @param string $footer
	 * @return string
	 */
	public function getHTML($header = '', $footer = ''){
		$title = htmlspecialchars($this->label, ENT_QUOTES, 'UTF-8');
		$html = <<<HTML
<html xmlns:epub="http://www.idpf.org/2007/ops">
<head>
<meta charset="UTF-8">
<title>{$title}</title>
{$header}
</head>
<body>
HTML;
		$html .= $this->getNavHTML();
		$html .= <<<HTML
{$footer}
</body>
</html>
HTML;
		return $html;
	}

	/**
	 * Get navigation html
	 *
	 * @return string
	 */
	public function getNavHTML(){
		if( !$this->root ){
			return '';
		}
		$html = '<nav epub:type="toc" id="toc"><ol>';
		foreach( $this->children as $child ){
			$html .= $this->makeList($child);
		}
		$html .= '</ol></nav>';
		return $html;
	}

	/**
	 * Make list
	 *
	 * @param Toc $toc
	 *
	 * @return string
	 */
	private function makeList( Toc $toc ){
		$html = sprintf('<li><a href="%s">%s</a>', $toc->link, htmlspecialchars($toc->label, ENT_QUOTES, 'UTF-8'));
		if( !empty($toc->children) ){
			$html .= '<ol>';
			foreach( $toc->children as $child ){
				$html .= $this->makeList($child);
			}
			$html .= '</ol>';
		}
		$html .= '</li>';
		return $html;
	}

	/**
	 * Get toc instance
	 *
	 * @param string $id
	 *
	 * @return static
	 */
	public static function get($id){
		if( isset(self::$instances[$id]) ){
			return self::$instances[$id];
		}
		return null;
	}

	/**
	 * Initialize toc element
	 *
	 * @param string $id
	 * @param string $label
	 *
	 * @return mixed
	 */
	public static function init($id, $label = 'Index'){
		if( !isset(self::$instances[$id]) ){
			self::$instances[$id] = new Toc($label, '', true);
		}
		return self::$instances[$id];
	}
}
