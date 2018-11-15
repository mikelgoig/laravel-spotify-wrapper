<?php

namespace Mgoigfer\SpotifyWrapper;

use Illuminate\Support\ServiceProvider;
use Mgoigfer\SpotifyWrapper\SpotifyWrapper;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyWrapperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/spotify.php' => config_path('spotify.php'),
            ], 'config');

            if (!class_exists('CreateSpotifyTable')) {
                $timestamp = date('Y_m_d_His', time());
                $this->publishes([
                    __DIR__.'/../database/migrations/create_spotify_table.php' => database_path('migrations/'.$timestamp.'_create_spotify_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('SpotifyWrapper', function ($app, $parameters = [])
        {
            $session = new Session(
                config('spotify.client_id'),
                config('spotify.client_secret'),
                array_key_exists('callback', $parameters) ? config('app.url').$parameters['callback'] : ''
            );

            $api = new SpotifyWebAPI();

            return new SpotifyWrapper($session, $api, $parameters);
        });
    }
}
