<?php

use Hametuha\HamePub\MetaInf\Container;

/**
 * Container Test
 */
class ContainerTest extends \Hametuha\HamePub\Test
{

	/**
	 * Skeleton file will be placed
	 */
	public function testSkeleton(){
		$container = Container::get($this->id);
		$this->assertInstanceOf('Hametuha\\HamePub\\MetaInf\\Container', $container);
		$container->setRootFile('OEBPS/changed.opf', 0);
		$container->addRootFile('OEBPS/another.opf');
		$container->putXML();
		// Check file exists
		$actual = $this->epub_dir.DIRECTORY_SEPARATOR.$container->proper_path;
		$this->assertFileExists($actual);
		// Check file equals
		$expect = $this->asset_dir.DIRECTORY_SEPARATOR.'container.xml';
		$this->assertXmlFileEqualsXmlFile($expect, $actual);
	}

}