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
    public $label = '';

    /**
     * @var string
     */
    public $link = '';

    /**
     * @var bool
     */
    public $root = true;

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
    private function __construct($label, $link = '', $root = false)
    {
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
     * @return Toc
     */
    public function addChild($label, $link, $index = -1)
    {
        $this->children[$link] = new Toc($label, $link);
        return $this->children[$link];
    }

    /**
     * Get simple navigation
     *
     * @param string $header
     * @param string $footer
     * @return string
     */
    public function getHTML($header = '', $footer = '')
    {
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
     * @param string $content_label
     * @return string
     */
    public function getNavHTML($content_label)
    {
        if (!$this->root) {
            return '';
        }
        $landmarks = '';
        $toc = '';
        foreach ($this->children as $child) {
            $toc .= $this->makeList($child, false);
            $landmarks .= $this->makeList($child, true, $content_label);
        }
        $html = <<<HTML
<nav epub:type="toc" id="toc">
	<ol>
		{$toc}
	</ol>
</nav>

<nav id="landmarks" epub:type="landmarks" hidden="hidden" class="hidden">
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
     * @param bool $require_type Default false. If true, landmarks will be created.
     * @param string $content_label
     * @return string
     */
    private function makeList(Toc $toc, $require_type = false, $content_label = '')
    {
        static $did_body_matter = false;
        if (!$require_type) {
            // For toc
            $html = sprintf('<li><a href="%s">%s</a>', $toc->link, htmlspecialchars($toc->label, ENT_QUOTES, 'UTF-8'));
            if (!empty($toc->children)) {
                $html .= "\n<ol" . ($require_type ? ' epub:type="list"' : '') . ">\n";
                foreach ($toc->children as $child) {
                    $html .= $this->makeList($child, $require_type);
                }
                $html .= "</ol>\n";
            }
        } else {
            // For landmark
            $type = strtolower(str_replace('.xhtml', '', $toc->link));
            switch ($type) {
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
                    if (false !== strpos($type, '#')) {
                        $epub_type = 'bridgehead';
                    } else {
                        $epub_type = 'bodymatter';
                    }
                    break;
            }

            if (!$epub_type || 'bridgehead' == $epub_type) {
                return '';
            }
            $label = $toc->label;
            if ('bodymatter' === $epub_type) {
                if ($did_body_matter) {
                    return '';
                } else {
                    $did_body_matter = true;
                }
                if ($content_label) {
                    $label = $content_label;
                }
            }
            $html = sprintf('<li><a href="%s" epub:type="%s">%s</a>', $toc->link, $epub_type, htmlspecialchars($label, ENT_QUOTES, 'UTF-8'));
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
    public static function get($id)
    {
        if (isset(self::$instances[$id])) {
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
    public static function init($id, $label = 'Index')
    {
        if (!isset(self::$instances[$id])) {
            self::$instances[$id] = new Toc($label, '', true);
        }
        return self::$instances[$id];
    }

    /**
     * Get toc length
     *
     * @return int
     */
    public function length()
    {
        return count($this->children);
    }
}
