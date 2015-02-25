<?php

namespace Hametuha\HamePub\Definitions;


/**
 * Mime types
 *
 * @see http://imagedrive.github.io/spec/epub301-publications.xhtml#tbl-core-media-types
 * @package Hametuha\HamePub\Definitions
 */
class Mime extends Prototype {


	/**
	 * GIF Image
	 */
	const GIF = 'image/gif';

	/**
	 * JPEG Image
	 */
	const JPEG = 'image/jpeg';

	/**
	 * PNG Image
	 */
	const PNG = 'image/png';

	/**
	 * SVG Content Documents
	 */
	const SVG = 'image/svg+xml';

	/**
	 * XHTML Content Documents
	 */
	const XHTML = 'application/xhtml+xml';

	/**
	 * NCX
	 *
	 * @deprecated
	 */
	const OPF2 = 'application/x-dtbncx+xml';

	/**
	 * OpenType font
	 */
	const OpenType = 'application/vnd.ms-opentype';

	/**
	 * WOFF font
	 */
	const WOFF = 'application/font-woff';

	/**
	 * EPUB Media Overlay Document
	 */
	const MediaOverlays301 = 'application/smil+xml';

	/**
	 * Text-to-Speech Vocabulary
	 */
	const PLS = 'application/pls+xml';

	/**
	 * MP3 Audio
	 */
	const MP3 = 'audio/mpeg';

	/**
	 * MP4, AAC, LC Audio
	 */
	const MP4 = 'audio/mp4';

	/**
	 * EPUB Style Sheets
	 */
	const CSS = 'text/css';

	/**
	 * Scripts
	 */
	const JS = 'text/javascript';

	/**
	 * Get extension from file path
	 *
	 * @param string $file_name
	 *
	 * @return string
	 */
	public static function getTypeFromPath($file_name){
		$ext = strtolower(preg_replace('/^.*\.([^.]+)$/', '$1', $file_name));
		switch( $ext ){
			case 'jpeg':
			case 'jpg':
				return self::JPEG;
				break;
			case 'otf':
				return self::OpenType;
				break;
			case 'opf':
				return self::OPF2;
				break;
			case 'smil':
				return self::MediaOverlays301;
				break;
			case 'js':
				return self::JS;
				break;
			default:
				$const_name = strtoupper($ext);
				$refl = new \ReflectionClass(get_called_class());
				return $refl->getConstant($const_name);
				break;
		}
	}

	/**
	 * Return folder name
	 *
	 * @param string $path
	 *
	 * @return string
	 */
	public static function getDestinationFolder($path){
		$path = (string) $path;
		if( preg_match('/\.(jpe?g|gif|png|svg)$/i', $path) ) {
			return 'Image';
		}elseif( preg_match('/\.(otf|woff|ttf)$/i', $path) ) {
			return 'Font';
		}elseif( preg_match('/\.(css)$/i', $path) ) {
			return 'CSS';
		}elseif( preg_match('/\.(mp4|mp3)$/i', $path) ){
			return 'Media';
		}elseif( preg_match('/\.(smil|pls)$/i', $path) ){
			return 'Speech';
		}elseif( preg_match('/\.(js|json)$/i', $path) ){
			return 'JS';
		}elseif( preg_match('/\.xhtml)$/i', $path) ){
			return 'XHTML';
		}else{
			return 'Misc';
		}
	}

}
