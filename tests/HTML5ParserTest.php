<?php

use Hametuha\HamePub\Test;
use Hametuha\HamePub\Parser\HTML5Parser;


class HTML5ParserTest extends Test
{

	protected $remote_url = 'https://hametuha-static.s3-ap-northeast-1.amazonaws.com/hamepub/test.html';

	/**
	 * Test Remote file download
	 */
	public function testRemote(){
		// Check instance
		$html5 = HTML5Parser::get($this->id);
		$this->assertInstanceOf('Hametuha\HamePub\Parser\HTML5Parser', $html5);
		// Get remote file
		$expected = file_get_contents($this->asset_dir.'/test.html');
		$real = $html5->getRemoteFile($this->remote_url);
		$this->assertEquals($expected, $real);
		// Try Timeout
		$content = $html5->getRemoteFile('https://takahashifumiki.com/timeout.php');
		$this->assertFalse($content);
	}

}
