<?php

use Hametuha\HamePub\Test;
use Hametuha\HamePub\Parser\HTML5Parser;


class HTML5ParserTest extends Test
{

	/**
	 * Test Remote file download
	 */
	public function testRemote(){
		// Check instance
		$html5 = HTML5Parser::get($this->id);
		$this->assertInstanceOf('Hametuha\HamePub\Parser\HTML5Parser', $html5);
		// Get remote file
		$url = 'https://dl.dropboxusercontent.com/u/569741/test.html';
		$expected = file_get_contents($this->asset_dir.'/test.html');
		$real = $html5->getRemoteFile($url);
		$this->assertEquals($expected, $real);
		// Try Timeout
		$content = $html5->getRemoteFile('http://takahashifumiki.com/timeout.php');
		$this->assertFalse($content);
	}

}
