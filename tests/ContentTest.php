<?php

use Hametuha\HamePub\Oebps\Content;
use \Hametuha\HamePub\Definitions\Marc;

class ContentTest extends Hametuha\HamePub\Test
{

	/**
	 * @var Content
	 */
	protected $content = null;

	/**
	 * Set up
	 */
	protected function setUp(){
		parent::setUp();
		$this->content = Content::get($this->id);
	}

	/**
	 * Basic OPF values
	 */
	public function testBasicOpf(){
		$this->assertInstanceOf('Hametuha\HamePub\Oebps\Content', $this->content);
		// Set identifier and language
		$this->content->setIdentifier('http://hametuha.com');
		$this->content->setLang('en_US');
		// Set meta dadta
		// title
		$this->content->addMeta('dc:title', 'ePub by Hametuha');
		// schema
		$this->content->addMeta('dc:creator', 'Takahashi Fumiki', [
			'id' => 'creator',
		]);
		$this->content->addMeta('meta', Marc::AUTHOR, [
			'refines' => '#creator',
			'property' => 'role',
			'scheme' => Marc::getSchema(),
			'id' => 'role',
		]);
		// Add items
		$this->content->addItem('nav.xhtml', 'Documents/nav.xhtml', ['nav']);
		$this->content->addItem('chapter1.xhtml', 'Documents/chapter1.xhtml');
		$this->content->addItem('fig2.jpg', 'Images/images/fig2.jpg');
		// Check file is output
		$out = $this->content->putXML();
		$this->assertFileExists($out);
		$this->assertXmlFileEqualsXmlFile($this->asset_dir.DIRECTORY_SEPARATOR.'content-meta-only.opf', $out);
	}
}
