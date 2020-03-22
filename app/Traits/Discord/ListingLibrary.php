<?php

namespace App\Traits\Discord;

use App\Traits\DiscordWrapper;

trait ListingLibrary
{
    use DiscordWrapper;

    public function listServerOAuthRedirectURL($server_id, $discord_id)
    {
        $params = array(
            'client_id' => config('services.discord.client_id'),
            'redirect_uri' => config('services.discord.redirect_uri'),
            'response_type' => 'code',
            'scope' => 'identify bot guilds guilds.join',
            'state' => base64_encode($server_id . '::' . $discord_id . '::' . $meow =  \Carbon\Carbon::now()->addMinutes(15))
        );

        return 'https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params);
    }

    public function listedServerAccessTokenExchange($code, $state)
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
}
