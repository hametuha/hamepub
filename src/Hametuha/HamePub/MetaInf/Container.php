<?php

namespace Hametuha\HamePub\MetaInf;


class Container extends Prototype
{

	/**
	 * Set root file's path
	 *
	 * @param string $path
	 * @param int $index
	 */
	public function setRootFile($path, $index = 0){
		$this->dom->rootfiles->rootfile[$index]['full-path'] = $path;
	}

	/**
	 * Set root file element
	 *
	 * @param string $path
	 */
	public function addRootFile($path){
		$rootFile = $this->dom->rootfiles->addChild('rootfile');
		$rootFile['full-path'] = $path;
		$rootFile['media-type'] = 'application/oebps-package+xml';
	}

}
