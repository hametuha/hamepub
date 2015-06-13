<?php

namespace Hametuha\HamePub\Oebps;


use Hametuha\HamePub\Pattern\Application;


/**
 * Toc generator
 *
 * @package Hametuha\HamePub\Oebps
 */
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
	 * @param int $index
	 */
	public function addChild($label, $link, $index = -1){
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
		$landmarks = '';
		$toc = '';
		foreach( $this->children as $child ){
			$toc .= $this->makeList($child);
			$landmarks .= $this->makeList($child, true);
		}
		$html = <<<HTML
<nav epub:type="toc" id="toc">
	<ol>
		{$toc}
	</ol>
</nav>
<nav epub:type="landmarks" hidden="hidden" class="hidden">
	<ol epub:type="list">
		{$landmarks}
	</ol>
</nav>
HTML;
		return trim($html);
	}

	/**
	 * Make list
	 *
	 * @param Toc $toc
	 *
	 * @return string
	 */
	private function makeList( Toc $toc, $require_type = false ){
		if( !$require_type ){
			$epub_type = '';
		}else{
			$type = strtolower(str_replace('.xhtml', '', $toc->link));
			switch( $type ){
				case 'cover':
				case 'toc':
				case 'landmarks':
				case 'preface':
				case 'prologue':
				case 'epigraph':
				case 'epilogue':
				case 'afterword':
				case 'colophon':
				case 'bibliography':
				case 'titlepage':
				case 'contributors':
				case 'dedication':
					$epub_type = $type;
					break;
				default:
					$epub_type = 'bodymatter';
					break;
			}
			if( $epub_type ){
				$epub_type = sprintf(' epub:type="%s"', $epub_type);
			}
		}
		$html = sprintf('<li><a href="%s"%s>%s</a>', $toc->link, $epub_type, htmlspecialchars($toc->label, ENT_QUOTES, 'UTF-8'));
		if( !empty($toc->children) ){
			$html .= "\n<ol>\n";
			foreach( $toc->children as $child ){
				$html .= $this->makeList($child, $require_type);
			}
			$html .= "</ol>\n";
		}
		$html .= "</li>\n";
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

	/**
	 * Get toc length
	 *
	 * @return int
	 */
	public function length(){
		return count($this->children);
	}
}
