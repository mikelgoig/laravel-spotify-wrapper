# Laravel Spotify Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mgoigfer/laravel-spotify-wrapper.svg?style=flat-square)](https://packagist.org/packages/mgoigfer/laravel-spotify-wrapper)
[![Build Status](https://img.shields.io/travis/mgoigfer/laravel-spotify-wrapper/master.svg?style=flat-square)](https://travis-ci.org/mgoigfer/laravel-spotify-wrapper)
[![Quality Score](https://img.shields.io/scrutinizer/g/mgoigfer/laravel-spotify-wrapper.svg?style=flat-square)](https://scrutinizer-ci.com/g/mgoigfer/laravel-spotify-wrapper)
[![Total Downloads](https://img.shields.io/packagist/dt/mgoigfer/laravel-spotify-wrapper.svg?style=flat-square)](https://packagist.org/packages/mgoigfer/laravel-spotify-wrapper)

This is a PHP wrapper for [jwilsson/spotify-web-api-php](https://github.com/jwilsson/spotify-web-api-php). It includes:

* Authorization flow helpers.

## Installation

You can install this package via [Composer](https://getcomposer.org/):

```bash
composer require mgoigfer/laravel-spotify-wrapper
```

Add the following lines to `config/services.php`:

```php
'spotify' => [
    'client_id' => env('SPOTIFY_CLIENT_ID'),
    'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
],
```

## Usage

``` php
$spotify = app()->make('SpotifyWrapper', [
    'callback' => '/playlist',
]);
```

Available options:

* `callback`: _Optional_. The URI to redirect to after the user grants or denies permission. This URI needs to have been entered in the Redirect URI whitelist that you specified when you registered your application.
* `scope`: _Optional_. A space-separated list of scopes. If no scopes are specified, authorization will be granted only to access publicly available information.
* `show_dialog`: _Optional_. Whether or not to force the user to approve the app again if they’ve already done so. If `false` (default), a user who has already approved the application may be automatically redirected to the URI specified by redirect_uri. If `true`, the user will not be automatically redirected and will have to approve the app again.

### Method Reference

These are the available methods:

#### requestAccessToken

```php
SpotifyWrapper\SpotifyWrapper::requestAccessToken()
```

Request an access token.

First of all, the user will be redirected to Spotify to approve the app. Then, the user is redirected back with an authorization code, in which we request an access token.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Mikel Goig](https://github.com/mgoigfer)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
