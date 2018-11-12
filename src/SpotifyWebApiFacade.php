<?php

namespace Mgoigfer\SpotifyWebApi;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mgoigfer\SpotifyWebApi\SpotifyWebApiClass
 */
class SpotifyWebApiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-spotify-web-api';
    }
}
