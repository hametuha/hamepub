HamePub
=======

A PHP Library for ePub by Hametuha. [![Build Status](https://travis-ci.org/hametuha/hamepub.svg)](https://travis-ci.org/hametuha/HamePub)

HemePub's living example is [hametuha](http://hametuha.com). It's a WordPress site which is able to publish it's contents to ePub.

If you maintain PHP-based web apps, HamePub will help your multi-publishing.

**NOTICE:** HamePub means nothing sexual. I wrote like this, because it sounds meaningful in Japanese.（HamePubはePub作成のためのPHPライブラリであり、エッチな出来事が起きるパブではありません）

## How to Install

Use composer.

```json
"require": {
  "hametuha/hamepub": "dev-master"
}
```

## How to USE

Mmm... It's little bit hard to generate ePub... Isn't it?

I can't write down everything here. Please wait for completion.

```php
// Load library
require 'vendor/autoload.php';
// $contents is an associative array which consists of
// html strings of you ebook contents.
// Start Creating
$factory = Factory::init('my-epub', PATH_TO_TMP_DIR);
// Create toc
foreach( $contents as $key => $html ){
   // Register toc
   $page_toc = $factory->toc->addChild( $key, $key.'.xhtml');
   // Grab all headers and add them to toc.
   $dom = $factory->parser->html5->loadHTML($html);
   // 3 is maximum header level, 2 means depth. 
   $factory->parser->grabHeaders($page_toc, $dom, true, 3, 2);
   // Now, all headers have id anchor.
   $html = $factory->parser->convertToString($dom);
   // Recreate DOM.
   $dom = $factory->registerHTML( $key, $html );
   // Grab all images
   foreach( $factory->parser->extractAssets( $dom, 'img', 'src', '#http://example\.jp/assets#', ASSETS_DIR ) as $path ){
   	 $factory->opf->addItem( $path, '' );
   }
   // Register to OPF
   $factory->ofp->addItem( "Text/{$key}.xhtml", "{$key}.xhtml");
   // Save HTML
   $factory->parser->saveDom($dom, "{$key}.xhtml");
}
// Set OPF.
$factory->opf->setLang( 'en_US' );
$factory->opf->setTitle( 'My First eBook', 'main-title' );
$factory->opf->putXML();
$factory->container->pubXML();
// Save it!
$factory->compile('path/to/epub');
```

## Current Version

- 0.4 (alpha)

## Caution

This library is under alpha and highly experimental. Do not trust this until Beta! 

## License

As wrote in LICENSE file, this library is released under [MIT](https://opensource.org/licenses/MIT).
