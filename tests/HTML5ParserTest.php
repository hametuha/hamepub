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
//		// Try Timeout
//		$content = $html5->getRemoteFile('https://takahashifumiki.com/timeout.php', [
//			'http' => [
//				'timeout' => 3,
//			],
//		] );
//		$this->assertFalse($content);
	}

	/**
	 * Test auto TCY logic
	 */
	public function testTcy(){
		$html5 = HTML5Parser::get($this->id);
		$orig = <<<HTML
<p>
これは正しく縦中横になる20です。これは<a href="http://hoge.jp/あopい1う">リンク</a>ですが、属性値の中は縦中横になりません。
</p>
HTML;
		$result = <<<HTML
<p>
これは正しく縦中横になる<span class="tcy">20</span>です。これは<a href="http://hoge.jp/あopい1う">リンク</a>ですが、属性値の中は縦中横になりません。
</p>
HTML;
		// Parse
		$test_result = $html5->tcyiz( $orig );
		// Result
		$this->assertEquals( $result, $test_result );
	}

	/**
	 * Check format logic
	 */
	public function testFormat(){
		$html5 = HTML5Parser::get($this->id);
		$html = <<<HTML
<html>
<p>「これはインデント下がらない」ので、<tt>コード</tt>はspanになる。</p>
<colgroup>
<col>a</col>
</colgroup>
</html>
HTML;
		$result = $html5->format($html);
		$expected = <<<HTML
<html>
<p class="no-indent">「これはインデント下がらない」ので、<span class="tt">コード</span>はspanになる。</p>
</html>
HTML;
		$this->assertXmlStringEqualsXmlString( $expected, $result );
	}
}
