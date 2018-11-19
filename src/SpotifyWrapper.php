<?php

namespace Mgoigfer\SpotifyWrapper;

use Exception;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;

class SpotifyWrapper
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
        'show_dialog' => false,
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
    public function __construct(Session $session, SpotifyWebAPI $api, $parameters = [])
    {
        $this->session = $session;
        $this->api = $api;

        if (array_key_exists('scope', $parameters)) {
            $this->options['scope'] = $parameters['scope'];
        }

        if (array_key_exists('show_dialog', $parameters)) {
            $this->options['show_dialog'] = $parameters['show_dialog'];
        }
    }

    /**
     * Redirect to the Spotify authorize URL.
     *
     * @return void
     */
    private function redirectToSpotifyAuthorizeUrl()
    {
        header("Location: {$this->session->getAuthorizeUrl($this->options)}");
        die();
    }

    /**
     * Request an access token.
     *
     * @return void|string
     */
    public function requestAccessToken()
    {
        try {
            $this->session->requestAccessToken($_GET['code']);
            return $this->session->getAccessToken();
        } catch (Exception $e) {
            $this->redirectToSpotifyAuthorizeUrl();
        }
    }

    /**
     * Request a refresh token.
     *
     * @return void|string
     */
    public function requestRefreshToken()
    {
        try {
            $this->session->requestAccessToken($_GET['code']);
            return $this->session->getRefreshToken();
        } catch (Exception $e) {
            $this->redirectToSpotifyAuthorizeUrl();
        }
    }

    /**
     * Refresh the access token.
     *
     * @param  string  $refresh_token
     *
     * @return string
     */
    public function refreshAccessToken($refresh_token)
    {
        $this->session->refreshAccessToken($refresh_token);
        return $this->session->getAccessToken();
    }
}
