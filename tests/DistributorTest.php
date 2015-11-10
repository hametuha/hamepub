<?php

use Hametuha\HamePub\File\Distributor;


class DistributorTest extends \Hametuha\HamePub\Test
{

	/**
	 * Test Directory setting
	 */
	public function testDirectory(){
		// Initialize
		$this->assertInstanceOf('Hametuha\\HamePub\\File\\Distributor', $this->distributor);
		// Skeleton check
		$this->assertFileExists($this->distributor->path->skeleton);
		//
		// Copy Sample File
		//
		$sample = $this->asset_dir.DIRECTORY_SEPARATOR.'sample.txt';
		$copied = $this->distributor->copy($sample, 'sample.txt');
		// Check existence
		$this->assertFileExists($copied, 'File is not copied properly.');
		// Check content
		$this->assertFileEquals($sample, $copied, 'File contents aren\'t same.');
		//
		// Write file
		//
		$vlah = 'Vlah, Vlah, Vlah';
		$written = $this->distributor->write($vlah, 'trash'.DIRECTORY_SEPARATOR.'written.txt');
		// Check existence
		$this->assertFileExists($written, 'File isn\'t written properly.');
		// Check contents
		$this->assertEquals($vlah, file_get_contents($written), 'File contents aren\'t same.');
		//
		// Compile file
		//
		$epub = $this->tmp_dir.DIRECTORY_SEPARATOR."{$this->id}.epub";
		$this->distributor->compile($epub);
		$this->assertFileExists($epub);
	}

}