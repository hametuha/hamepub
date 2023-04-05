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
    public function setIdentifier($urn)
    {
        $identifier = $this->dom->metadata->children('dc', true)->identifier[0];
        $identifier[0] = $urn;
        return $identifier->attributes()->id;
    }

    /**
     * Set language
     *
     * @param string $lang_code
     * @return \SimpleXMLElement
     */
    public function setLang($lang_code)
    {
        $lang = $this->dom->metadata->children('dc', true)->language[0];
        $lang[0] = $this->h($lang_code);
        return $lang;
    }

    /**
     * Set title meta
     *
     * @param string $string
     * @param string $id
     * @param string $type 1 of 'main', 'subtitle', 'short', 'collection', 'edition' and 'expanded'
     * @param int $sequence
     */
    public function setTitle($string, $id, $type = 'main', $sequence = 1)
    {
        $sequence = max(1, $sequence);
        // Add title
        $title = $this->dom->metadata->addChild('title', $this->h($string), Schemas::DC);
        $title['id'] = $id;
        // Add title meta
        $meta = $this->dom->metadata->addChild('meta', $type);
        $meta['refines'] = '#' . $id;
        $meta['property'] = 'title-type';
        // Add sequence
        $meta = $this->dom->metadata->addChild('meta', $sequence);
        $meta['refines'] = '#' . $id;
        $meta['property'] = 'display-seq';
    }

    /**
     * Add author to as meta value.
     *
     * @param string $value Name of author.
     * @param string $id    ID of author.
     * @param string $tag   Default is 'creator' or 'contributor'
     * @param string $role  Role tag. See {https://www.loc.gov/marc/relators/relaterm.html}
     *
     * @return void
     */
    public function addAuthor( $value, $id, $tag = 'creator', $role = '' ) {
        $creator = $this->dom->metadata->addChild( $tag, $this->h( $value ), Schemas::DC );
        $creator['id'] = $id;
        if ( $role ) {
            $meta = $this->dom->metadata->addChild( 'meta', $role );
            $meta['refines'] = '#' . $id;
            $meta['property'] = 'role';
            $meta['scheme'] = 'marc:relators';
            $meta['id'] = 'role-of-' . $id;
        }
    }

    /**
     * Add modified date
     *
     * @param int|string $timestamp If int, treated as UTC timestamp.
     */
    public function setModifiedDate($timestamp)
    {
        if ( is_int( $timestamp ) ) {
            $timestamp = date('Y-m-d\TH:i:s\Z', $timestamp);
        }
        $this->addMeta('meta', $timestamp, [
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
    public function addMeta($tag, $value, array $attributes = [])
    {
        $value = $this->h($value);
        if (false !== strpos($tag, ':')) {
            $tags = explode(':', $tag);
            $node = $this->dom->metadata->addChild($tags[1], $value, Schemas::getUri($tags[0]));
        } else {
            $node = $this->dom->metadata->addChild($tag, $value);
        }
        foreach ($attributes as $key => $val) {
            $node[$key] = $this->h($val);
        }
    }

    /**
     * Add item to Content OPF.
     *
     * @param string $relative_path
     * @param string $id If empty, path will convert to id
     * @param array $properties Default empty. If set, properties will be set.
     * @return string
     */
    public function addItem($relative_path, $id = '', array $properties = [])
    {
        $id = $id ?: $this->pathToId($relative_path);
        // Avoid duplication
        foreach ($this->dom->manifest->item as $item) {
            /** @var \SimpleXMLElement $item */
            $attr = $item->attributes();
            if (isset($attr['id']) && $id == $attr['id']) {
                return $id;
            }
        }
        // This is unique.
        $item = $this->dom->manifest->addChild('item');
        $item['id'] = $id;
        $item['href'] = $relative_path;
        $item['media-type'] = Mime::getTypeFromPath($relative_path);
        if ($properties) {
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
    public function addIdref($id, $liner = 'yes', array $properties = [])
    {
        $itemref = $this->dom->spine->addChild('itemref');
        $itemref['idref'] = $id;
        if ('no' === $liner) {
            $itemref['linear'] = 'no';
        }
        if (!empty($properties)) {
            $itemref['properties'] = implode(' ', $properties);
        }
        return $itemref;
    }

    /**
     * Add guide element
     *
     * This `guide` element is not nescesary for ePub 3.0,
     * but KF8(Kindle) still requires it.
     *
     * @see http://www.idpf.org/epub/20/spec/OPF_2.0.1_draft.htm#Section2.6
     * @param string $type
     * @param string $href
     *
     * @return mixed
     */
    public function addGuide($type, $href)
    {
        if (!$this->dom->guide->count()) {
            $guide = $this->dom->addChild('guide');
        } else {
            $guide = $this->dom->guide;
        }
        $ref = $guide->addChild('reference');
        $ref['type'] = $type;
        $ref['href'] = $href;
        return $ref;
    }

    /**
     * Convert id to path
     *
     * @param string $path
     *
     * @return string
     */
    public function pathToId($path)
    {
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
    public function __get($name)
    {
        switch ($name) {
            case 'proper_path':
                return 'OEBPS' . DIRECTORY_SEPARATOR . "{$this->name}.{$this->extension}";
                break;
            case 'direction':
                $attr = $this->dom->spine[0]->attributes();
                return (string)( $attr['page-progression-direction'] ?? '' );
                break;
            default:
                return parent::__get($name);
                break;
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case 'direction':
                switch ($value) {
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
