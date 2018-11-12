<?php

namespace Mgoigfer\Spotify;

use Exception;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class Spotify
{
    /**
     * The Spotify session.
     */
    private $session;

    /**
     * The Spotify API.
     */
    private $api;

    /**
     * The Spotify options.
     */
    private $options = [
        'scope' => [],
    ];

    /**
     * Create a new Spotify instance.
     *
     * @param  \SpotifyWebAPI\Session  $session
     * @param  \SpotifyWebAPI\SpotifyWebAPI  $api
     * @param  array  $parameters
     *
     * @return void
     */
    public function __construct(Session $session, SpotifyWebAPI $api, $parameters)
    {
        $this->session = $session;
        $this->api = $api;
        $this->options['scope'] = $parameters['scope'];
    }

    /**
     * Redirect to the Spotify authorize URL.
     */
    private function redirectToSpotifyAuthorizeUrl()
    {
        header("Location: {$this->session->getAuthorizeUrl($this->options)}");
        die();
    }

    /**
     * Request a refresh token.
     *
     * @return void|string
     */
    public function requestRefreshToken()
    {
        if (isset($_GET['code'])) {
            try {
                $this->session->requestAccessToken($_GET['code']);
                return $this->session->getRefreshToken();
            } catch (Exception $e) {
                $this->redirectToSpotifyAuthorizeUrl();
            }
        } else {
            $this->redirectToSpotifyAuthorizeUrl();
        }
    }
}
