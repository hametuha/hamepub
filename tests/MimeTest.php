<?php

use Hametuha\HamePub\Definitions\Mime;


class MimeTest extends \Hametuha\HamePub\Test
{

	/**
	 * Test mime type
	 */
	public function testExtension(){
		$this->assertEquals(Mime::JPEG, Mime::getTypeFromPath('my-picture.jpg'));
		$this->assertEquals(Mime::PNG, Mime::getTypeFromPath('my-picture.png'));
		$this->assertEquals(Mime::GIF, Mime::getTypeFromPath('my-picture.gif'));
		$this->assertEquals(Mime::JPEG, Mime::getTypeFromPath('my-picture.JPG'));
		$this->assertEquals(Mime::XHTML, Mime::getTypeFromPath('foo/var/test.xhtml'));
		$this->assertEquals(Mime::MediaOverlays301, Mime::getTypeFromPath('hoge/fuga.smil'));
		$this->assertEquals(Mime::PLS, Mime::getTypeFromPath('my-announce.pls'));
		$this->assertEquals(Mime::OpenType, Mime::getTypeFromPath('hiragino.otf'));
		$this->assertEquals(Mime::MP3, Mime::getTypeFromPath('video.mp3'));
		$this->assertEquals(Mime::CSS, Mime::getTypeFromPath('style.css'));
	}

}
