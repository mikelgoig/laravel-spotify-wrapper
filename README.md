# PHP Spotify Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mgoigfer/laravel-spotify-wrapper.svg?style=flat-square)](https://packagist.org/packages/mgoigfer/laravel-spotify-wrapper)
[![Build Status](https://img.shields.io/travis/mgoigfer/laravel-spotify-wrapper/master.svg?style=flat-square)](https://travis-ci.org/mgoigfer/laravel-spotify-wrapper)
[![Quality Score](https://img.shields.io/scrutinizer/g/mgoigfer/laravel-spotify-wrapper.svg?style=flat-square)](https://scrutinizer-ci.com/g/mgoigfer/laravel-spotify-wrapper)
[![Total Downloads](https://img.shields.io/packagist/dt/mgoigfer/laravel-spotify-wrapper.svg?style=flat-square)](https://packagist.org/packages/mgoigfer/laravel-spotify-wrapper)

This is a PHP wrapper for [jwilsson/spotify-web-api-php](https://github.com/jwilsson/spotify-web-api-php). It includes:

* Authorization flow helpers.

## Installation

You can install the package via Composer:

```bash
composer require mgoigfer/laravel-spotify-wrapper
```

## Usage

``` php
$spotify = new Mgoigfer\SpotifyWrapper();
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Mikel Goig](https://github.com/mgoigfer)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
