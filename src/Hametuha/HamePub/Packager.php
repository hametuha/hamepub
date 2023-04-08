<?php

namespace Hametuha\HamePub;

use Hametuha\HamePub\Parser\SettingParser;
use Hametuha\HamePub\Pattern\Singleton;
use PHPUnit\Framework\Error\Error;

/**
 * Package ePub from directory.
 */
class Packager extends Singleton
{
    use SettingParser;

    /**
     * @var array Setting.
     */
    protected $setting = [];

    /**
     * @var string[] HTML strings.
     */
    protected $htmls = [];

    /**
     * @var string Newest modified HTML.
     */
    protected $newest = 0;

    /**
     * Parse and save setting.
     *
     * @param string $file Path to setting file.
     * @param string $tmp_dir Temporary directory.
     *
     * @return string ePub file path.
     * @throws \Exception
     */
    public function parse($file = 'setting.json', $tmp_dir = '')
    {
        $this->setting = $this->getSettingFromFile($file);
        // Set temporary directory.
        if (empty($tmp_dir)) {
            $tmp_dir = tempnam(sys_get_temp_dir(), 'hamepub-');
        }
        // Load HTMLs.
        $this->loadHtml();
        if (empty($this->htmls)) {
            throw new \Exception('No HTML files found.');
        }
        // Start parsing.
        $factory = Factory::init($this->setting[ 'id' ], $tmp_dir);
        // Set metadata.
        $factory->opf->setLang($this->setting[ 'lang' ]);
        $factory->opf->setTitle($this->setting[ 'title' ], 'main-title');
        $factory->opf->setModifiedDate($this->setting['published']);
        $factory->opf->direction = $this->setting['direction'];
        // Set authors.
        if (is_array($this->setting['author'])) {
            foreach ($this->setting['author'] as $index => $author) {
                $factory->opf->addAuthor(
                    $author['name'],
                    ( $author['id'] ?? sprintf('creator-%d', $index + 1) ),
                    ( ( isset($author['type']) && $author['type'] === 'contributor' ) ? 'contributor' : 'creator'),
                    ( $author['role'] ?? '' )
                );
            }
        } else {
            $factory->opf->addAuthor($this->setting['author'], 'creator');
        }
        foreach ($this->htmls as $key => $html) {
            // Register toc
            $toc = $factory->toc->addChild($key, $key . '.xhtml');
            // Grab all headers and add them to toc.
            $dom = $factory->parser->html5->loadHTML($html);
            // Grab header and add ID attributes.
            $factory->parser->grabHeaders($toc, $dom, true, $this->setting[ 'header' ][ 'max_level' ], $this->setting[ 'header' ][ 'max_level' ]);
            // Convert from dom object to string.
            $html = $factory->parser->convertToString($dom);
            // Recreate DOM.
            $dom = $factory->registerHTML($key, $html, $this->getLinear($key));
            // Grab all images
            foreach ($factory->parser->extractAssets($dom, 'img', 'src', $this->setting[ 'url_base' ], $this->setting[ 'root' ]) as $path) {
                $factory->opf->addItem($path, '');
            }
            // Grab all CSS
            foreach ($factory->parser->extractAssets($dom, 'link', 'href', $this->setting[ 'url_base' ], $this->setting[ 'root' ]) as $path) {
                $factory->opf->addItem($path, '');
            }
            // Register to OPF
            $properties = [];
            if (!empty($this->setting['properties'][$key])) {
                $properties = (array) $this->setting['properties'][$key];
            }
            $factory->opf->addItem("Text/{$key}.xhtml", $key . '-xhtml', $properties);
            // Save HTML
            $factory->parser->saveDom($dom, "{$key}.xhtml");
        }
        // If TOC is set, save it.
        if (!empty($this->setting['toc'])) {
            $factory->toc->label = $this->setting['toc'];
            $toc_html = $factory->toc->getHTML();
            $factory->opf->addItem('Text/toc.xhtml', 'text-toc-xhtml', ['nav']);
            $factory->parser->saveDom($factory->registerHTML('text-toc', $toc_html, 'no'), 'toc.xhtml');
        }
        // Set OPF.
        if (! empty($this->setting[ 'isbn' ])) {
            $factory->opf->setIdentifier($this->setting[ 'isbn' ]);
        }
        // If cover is set, add it.
        if ($this->setting['cover']) {
            $factory->addCover($this->setting['cover']);
        }
        $factory->opf->putXML();
        $factory->container->putXML();
        // Save it!
        $target = rtrim($this->setting['target'], '/') . '/' . $this->setting['id'] . '.epub';
        if (! is_writable(dirname($target))) {
            throw new \Exception('Target directory is not writable: ' . $target);
        }
        $factory->compile($target);
        return $target;
    }

    /**
     * Get linear property.
     *
     * @param string $key HTML name.
     * @return string
     */
    protected function getLinear($key)
    {
        return in_array($key, $this->setting['hidden'], true) ? 'no' : 'yes';
    }

    /**
     * Load HTML and save it in $htmls.
     * @return void
     */
    public function loadHtml()
    {
        $files = glob($this->setting[ 'root' ] . '/*.html');
        foreach ($files as $file) {
            $this->htmls[ basename($file, '.html') ] = file_get_contents($file);
            // Save modified time.
            $time = filemtime($file);
            if ($time > $this->newest) {
                $this->newest = $time;
            }
        }
    }

    /**
     * Dump setting for debugging.
     *
     * @return array
     */
    public function dumpSetting()
    {
        return  $this->defaultSetting();
    }
}
