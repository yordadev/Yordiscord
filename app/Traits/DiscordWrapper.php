<?php

namespace App\Traits;

use GuzzleHttp\Client;
use RestCord\DiscordClient;
use App\Traits\Discord\AccountLibrary;
use App\Traits\Discord\ListingLibrary;

trait DiscordWrapper
{
    use AccountLibrary, ListingLibrary;

    protected $base_uri  = 'https://discordapp.com/api/';

    public function OAuthRedirectURL()
    {
        $params = array(
            'client_id' => config('services.discord.client_id'),
            'redirect_uri' => config('services.discord.redirect_uri'),
            'response_type' => 'code',
            'scope' => 'identify email connections guilds',
            'state' => base64_encode(\Carbon\Carbon::now()->addMinutes(15))
        );

        return 'https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params);
    }

    public function accessTokenExchange($code, $state)
    {
        return array(
            'client_id'     => config('services.discord.client_id'),
            'grant_type' => 'authorization_code',
            'code'          => $code,
            'client_secret' => config('services.discord.client_secret'),
            'redirect_uri'  => config('services.discord.redirect_uri'),
            'state'         => $state
        );
    }

    public function exchangeAccessCode($path, $params, $headers)
    {
        return $this->sendAPIRequest('POST', $path, $params, $headers);
    }

    private function discordClient()
    {
        return new Client(['base_uri' => $this->base_uri]);
    }

    public function sendAPIRequest($method, $path, $params, $headers = [])
    {
        switch ($method) {
            case ('GET'):
                return json_decode($this->discordClient()->request($method, $path, [
                    'query' => $params,
                    'headers'     => $headers,
                ])->getBody()->getContents());
            case ('POST'):
                return json_decode($this->discordClient()->request($method, $path, [
                    'form_params' => $params,
                    'headers'     => $headers,
                ])->getBody()->getContents());
            case ('PUT'):
                return json_decode($this->discordClient()->request($method, $path, [
                    'form_params' => $params,
                    'headers'     => $headers,
                ])->getBody()->getContents());
            default:
                return null;
        }
    }

    public function botClient()
    {
        return new DiscordClient(['token' => config('services.discord.token')]);
    }
}
