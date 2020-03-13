<?php

namespace App\Traits\Discord;

use App\Traits\DiscordWrapper;

trait AccountLibrary
{
    use DiscordWrapper;

    public function fetchAccountDetails($token)
    {
        return $this->sendAPIRequest('GET', 'users/@me', [], [
            'Authorization' => 'Bearer ' . $token
        ]);
    }

    public function fetchAccountGuilds($token){
        return $this->sendAPIRequest('GET', 'users/@me/guilds', [], [
            'Authorization' => 'Bearer ' . $token
        ]);
    }

    public function ownsServer($server_id, $token){
        $servers = $this->fetchAccountGuilds($token);
        foreach($servers as $server){
            if($server->id === $server_id){
                if($server->owner){
                    return true;
                }
            }
        }
        return false;
    }
}
