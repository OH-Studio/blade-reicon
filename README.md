# Blade Reicon

<a href="https://github.com/OH-Studio/blade-reicon/actions?query=workflow%3ATests">
    <img src="https://github.com/OH-Studio/blade-reicon/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://github.com/OH-Studio/blade-reicon/actions/workflows/coding-standards.yml">
    <img src="https://github.com/OH-Studio/blade-reicon/actions/workflows/coding-standards.yml/badge.svg" alt="Coding Standards" />
</a>
<a href="https://packagist.org/packages/ohstudio/blade-reicon">
    <img src="https://img.shields.io/packagist/v/ohstudio/blade-reicon" alt="Latest Stable Version">
</a>
<a href="https://packagist.org/packages/ohstudio/blade-reicon">
    <img src="https://img.shields.io/packagist/dt/ohstudio/blade-reicon" alt="Total Downloads">
</a>

A package to easily make use of [Reicon](https://github.com/dqev/reicon) in your Laravel Blade views.

For a full list of available icons see [the SVG directory](resources/svg) or preview them at [reicon.dev](https://reicon.dev/). Reicon is developed by [REICON](https://github.com/dqev/reicon). This package is not affiliated with or endorsed by the Reicon project.

## Requirements

- PHP 8.2 or higher
- Laravel 11.0 or higher

## Installation

```bash
composer require ohstudio/blade-reicon
```

## Blade Icons

Blade Reicon uses Blade Icons under the hood. Please refer to [the Blade Icons readme](https://github.com/driesvints/blade-icons) for additional functionality. We also recommend to [enable icon caching](https://github.com/driesvints/blade-icons#caching) with this library.

## Configuration

Blade Reicon also offers the ability to use features from Blade Icons like default classes, default attributes, etc. If you'd like to configure these, publish the `blade-reicon.php` config file:

```bash
php artisan vendor:publish --tag=blade-reicon-config
```

## Usage

Icons can be used as self-closing Blade components which will be compiled to SVG icons:

```blade
<x-reicon-o-arrow-left/>
```

You can also pass classes to your icon components:

```blade
<x-reicon-o-arrow-left class="w-6 h-6 text-gray-500"/>
```

And even use inline styles:

```blade
<x-reicon-o-arrow-left style="color: #555"/>
```

Or use the `@svg` directive:

```blade
@svg('reicon-o-arrow-left', 'w-6 h-6', ['style' => 'color: #555'])
```

The solid icons can be referenced like this:

```blade
<x-reicon-s-arrow-left/>
```

Icon names are the names from Reicon's [icon dataset](https://github.com/dqev/reicon/blob/main/data/icon-data.json), so `search-normal2` becomes `reicon-o-search-normal2`. A few names appear in two categories; like Reicon's npm packages, the second one gets the category as a suffix, for example `reicon-o-archive2-newicons`. A few icons have no solid variant.

### Raw SVG Icons

If you want to use the raw SVG icons as assets, you can publish them using:

```bash
php artisan vendor:publish --tag=blade-reicon --force
```

Then use them in your views like:

```blade
<img src="{{ asset('vendor/blade-reicon/o-arrow-left.svg') }}" width="10" height="10"/>
```

## Updating the icons

The icons are generated from `data/icon-data.json` of the Reicon release named in [`.reicon-version`](.reicon-version). A scheduled GitHub workflow opens a pull request whenever Reicon publishes a new release. To regenerate them locally:

```bash
php bin/export.php
vendor/bin/blade-icons-generate
```

## License

Blade Reicon is open-sourced software licensed under [the MIT license](LICENSE.md). The Reicon icons are licensed under the MIT license by REICON; see [LICENSE.md](LICENSE.md).
