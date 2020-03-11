<?php

namespace App\Traits\Discord;

use App\Traits\DiscordWrapper;

trait AccountLibrary
{
    use DiscordWrapper;

    public function fetchAccountDetails($token)
    {
        return json_decode($this->sendAPIRequest('GET', 'users/@me', [], [
            'Authorization' => 'Bearer ' . $token
        ])->getBody()->getContents());
    }
}
