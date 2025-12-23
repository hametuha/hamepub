HamePub
=======


[![GitHub actions for HamePub](https://github.com/hametuha/hamepub/actions/workflows/hamepub.yml/badge.svg)](https://github.com/hametuha/hamepub/actions)

HemePub's living example is [hametuha](http://hametuha.com).
It's a WordPress site which is able to publish it's contents to ePub.

If you maintain PHP-based web apps, HamePub will help your multi-publishing.

**NOTICE:** HamePub means nothing sexual. I wrote like this, because it sounds meaningful in Japanese.
(HamePubはePub作成のためのPHPライブラリであり、エッチな出来事が起きるパブではありません）

## How to Install

Use composer.

```json
composer require haemtuha/hamepub
```

## How to Use

You can use HamePub for dynamic ePub generation,
but for clarification, suppose that you have a static HTML collection like below:

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
# Dump setting file to default location (setting.json in project root).
./vendor/bin/hamepub init

# Or specify a custom file path.
./vendor/bin/hamepub init file=my-setting.json
```

Next, edit JSON file like below:

```json
{
    "lang": "en",
    "root": "./dist/",
    "id": "my-first-ebook",
    "isbn": "1234567890123",
    "title": "My First Book",
    "author": "Fumiki Takahashi",
    "target": "./out",
    "published": "2023-01-01T23:00:00Z",
    "direction": "ltr",
    "cover": "./dist/img/cover.jpg",
    "toc": "Table of Contents",
    "header": {
        "max_level": 3,
        "depth": 2
    },
    "hidden": ["toc"]
}
```

### Setting Options

| Key | Required | Description |
|-----|----------|-------------|
| `id` | Yes | Unique identifier for the ePub (used as filename). |
| `title` | Yes | Book title. |
| `author` | Yes | Author name (string) or array of author objects. |
| `published` | Yes | Publication date in ISO 8601 format (e.g., `2023-01-01T23:00:00Z`). |
| `root` | No | Directory containing HTML files. Default: `./dist/` |
| `target` | No | Output directory for the ePub file. Default: `./tmp` |
| `lang` | No | Language code. Default: `en` |
| `isbn` | No | ISBN number. |
| `direction` | No | Reading direction (`ltr`, `rtl`, or `default`). Default: `default` |
| `cover` | No | Path to cover image. |
| `toc` | No | Table of contents title. Default: `Table of Contents` |
| `header.max_level` | No | Maximum header level to include in TOC. Default: `3` |
| `header.depth` | No | Header depth. Default: `2` |
| `hidden` | No | Array of HTML file names (without extension) to hide from spine. Default: `["toc"]` |
| `guides` | No | Array of guide objects with `type`, `href`, and optional `title`. |
| `properties` | No | Object mapping HTML file names to arrays of properties. |

Then, run command.

```bash
# Generate ePub using default setting file (setting.json).
./vendor/bin/hamepub generate

# Or specify a custom setting file.
./vendor/bin/hamepub generate file=my-setting.json
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
