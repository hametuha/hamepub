<?php

use Hametuha\HamePub\Factory;

/**
 * Class AutoLoaderTest
 */
class EnvTest extends PHPUnit_Framework_TestCase
{

	/**
	 * Test Auto Loader works
	 */
	public function testAutoLoader(){
		$this->assertEquals(true, class_exists('Hametuha\\HamePub\\Factory'));
	}

	/**
	 * Check same ID
	 *
	 * @expectedException \Hametuha\HamePub\Exception\SettingException
	 */
	public function testSameId(){
		$dir = __DIR__.DIRECTORY_SEPARATOR.'tmp';
		new Factory('foo', $dir);
		new Factory('foo', $dir);
	}


}