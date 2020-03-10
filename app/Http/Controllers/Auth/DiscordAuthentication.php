<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\DiscordWrapper;

class DiscordAuthentication extends Controller
{
    use DiscordWrapper;

    public function redirectUser()
    {
        $url = $this->OAuthRedirectURL();
        return redirect()->to($url);
    }

    public function callback(Request $request)
    {
        if(isset($request->code)){
            $response = $this->discordClient()->post('/oauth2/token', $this->accessTokenExchange($request->code));
            dd($response->getBody()->getContents());
        }
    }
}
