<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Spotify Auth
    |--------------------------------------------------------------------------
    |
    | This values are the Spotify API authentication credentials.
    |
    */

    'client_id' => config('services.spotify.client_id'),
    'client_secret' => config('services.spotify.client_secret'),

    /*
    |--------------------------------------------------------------------------
    | Spotify Database Table Name
    |--------------------------------------------------------------------------
    |
    | This is the name of the table where will be saved the Spotify refresh token.
    |
    */

    'database_table' => 'spotify',

];
