<?php

namespace App\Http\Controllers\Auth;

use App\Models\Account\User;
use Illuminate\Http\Request;
use App\Traits\DiscordWrapper;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Account\DiscordAccess;

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
        if (isset($request->code)) {
            try {
                $response = $this->exchangeAccessCode(
                    'oauth2/token',
                    $this->accessTokenExchange($request->code, $request->state),
                    [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'accept' => 'application/json'
                    ]
                );

                try {
                    $user = $this->findOrCreateAccount($response);
                    
                    Auth::login($user);

                    return redirect()->route('home');
                } catch (\Exception $e) {
                    return redirect()->route('landing')->with('success', $e->getMessage());
                }
            } catch (\Exception $e) {
                return redirect()->route('landing')->with('success', $e->getMessage());
            }
        }
        dd($request);
        //return redirect()->route('landing')->with('success', 'Something went wrong, probably doing something you shouldnt tbh..');
        // ermm derppppp.
    }

    private function findOrCreateAccount($access_response)
    {
        $user = $this->fetchAccountDetails($access_response->access_token);

        if (!is_null($userFound = $this->findAccount(($user)))) {
            // check if need to upddate access tokens
            if ($access = $userFound->grantedAccess()) {
                // access tokens found && check if they need to be updated.
                if ($access->access_token !== $access_response->access_token) {
                    try {
                        $access->update(collect($access_response)->toArray());
                    } catch (\Exception $e) {
                        dd($e);
                    }
                }
            }

            return $userFound;
        }
        $user = User::create([
            'avatar'        => $user->avatar,
            'username'      => $user->username,
            'email'         => $user->email,
            'discord_id'    => $user->id,
            'discriminator' => $user->discriminator,
            'verified'      => $user->verified,
            'locale'        => $user->locale,
            'mfa_enabled'   => $user->mfa_enabled,
            'flags'         => $user->flags,
            'premium_type'  => $user->premium_type
        ]);

        DiscordAccess::create([
            'discord_id'   => $user->discord_id,
            'access_token' => $access_response->access_token,
            'expires_in'   => $access_response->expires_in,
            'refresh_token' => $access_response->refresh_token,
            'scope'         => $access_response->scope,
            'token_type'    => $access_response->token_type
        ]);

        return $user;
    }

    private function findAccount($user)
    {
        if ($user = User::where([
            'discord_id' => $user->id
        ])->first()) {
            return $user;
        }
        return null;
    }
}
