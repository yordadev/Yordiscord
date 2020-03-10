<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait DiscordWrapper {

    protected $base_uri  = 'https://discordapp.com';
    protected $authorize = '/api/oauth2/authorize';
    protected $token = '/api/oauth2/token';
    protected $client;

 
    public function OAuthRedirectURL(){
        $params = array(
            'client_id' => config('services.discord.client_id'),
            'redirect_uri' => config('services.discord.redirect_uri'),
            'response_type' => 'code',
            'scope' => 'identify guilds bot guilds.join gdm.join messages.read activities.read',
            'state' => base64_encode(\Carbon\Carbon::now()->addMinutes(15))
          );


        return 'https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params);
    }

    public function accessTokenExchange($code){
        $params = array(
            'client_id'     => config('services.discord.client_id'),
            'redirect_uri'  => config('services.discord.redirect_uri'),
            'grant_type'    => 'authorization_code',
            'code'          => $code,
            'client_secret' => config('services.discord.client_secret'),
            'scope'         => 'identify guilds bot guilds.join gdm.join messages.read activities.read',
            'state' => base64_encode(\Carbon\Carbon::now()->addMinutes(15))
        );

        
        
    }

    protected function discordClient(){
        return $this->client = new Client(['base_uri' => $this->base_uri]);
    }

    protected function post($path, $params, $headers = []){
        return $this->client->request('POST', $path, [
            'form_params' => $params,
            'headers'     => $headers,
        ]);
    }

    
    
}


