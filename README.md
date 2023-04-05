HamePub
=======


[![GitHub actions for HamePub](https://github.com/hametuha/hamepub/actions/workflows/hamepub.yml/badge.svg)](https://github.com/hametuha/hamepub/actions)

HemePub's living example is [hametuha](http://hametuha.com). It's a WordPress site which is able to publish it's contents to ePub.

If you maintain PHP-based web apps, HamePub will help your multi-publishing.

**NOTICE:** HamePub means nothing sexual. I wrote like this, because it sounds meaningful in Japanese.（HamePubはePub作成のためのPHPライブラリであり、エッチな出来事が起きるパブではありません）

## How to Install

Use composer.

```json
composer require haemtuha/hamepub
```

## How to Use

You can user HamePub for dynamic ePub generation, but suppose that you have a static HTML collection like below:

```
dist
- index.html
- content.html
- colophon.html
- css
  - style.css
- img
  - cover.jpg
  - graph.jpg
  - barchart.png
```

Now we have CLI tool `hamepub` and you can run CLI command in your working directory.

```bash
# Dump setting file.
./vendor/bin/hamepub init setting.json
```

Next, edit JSON file like below:

```json
{
    "root": "./dist/",
    "id": "my-first-ebook",
    "isbn": "1234567890123",
    "title": "My First Book",
    "author": "Fumiki Takahashi",
    "target": "./out",
    "published": "2023-01-01T23:00:00Z",
    "direction": "ltr",
    "cover": "./dist/img/cover.jpg"
}
```

Then, run command.

```
./bendor/bin/hamepub generate 
```

You will get ePub file `my-first-ebook.epub`.

## Resources

Below are important resources.

- [ePub 3 Overview](https://www.w3.org/TR/epub-overview-33/)
- [Mark Code List for Relators](https://www.loc.gov/marc/relators/relaterm.html) is the definition of `author` section.

## Acknowledgement

The sample picture is credited by [Public Domain Pictures](https://www.pexels.com/ja-jp/photo/87742/) and [Nadi Lindsay](https://www.pexels.com/ja-jp/photo/3078831/).

## License

This library is released under [MIT](https://opensource.org/licenses/MIT).
