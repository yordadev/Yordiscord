<?php

namespace App\Http\Controllers\Account;

use App\Traits\DiscordWrapper;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Server\DiscordServer;
use App\Models\Server\ServerRecommendation;

class Profile extends Controller
{
    use DiscordWrapper;

    public function index()
    {
        $data  = [];
        $token = Auth::user()->grantedAccess()->access_token ?? null;
        $data['servers'] = cache()->remember('servers_' . Auth::user()->discord_id, 60, function () use ($token) {
            return $this->fetchAccountGuilds($token);
        });

        $data['listed_servers'] = $this->fetchListedServers();

        $data['recommended'] = cache()->remember('recommended_' . Auth::user()->discord_id, 60, function () {
            return $this->fetchRecommendHistory();
        });

        foreach ($data['servers'] as $server) {
            foreach ($data['recommended'] as $recommended) {
                if($server->id === $recommended->server_id){
                    $server->recommended = true;
                }
            }
            if(!isset($server->recommended)){
                $server->recommended = false;
            }
        }

        //dd($data);
        return view('account.profile', ['data' => $data]);
    }

    private function fetchListedServers()
    {
        return DiscordServer::where([
            'discord_id' => Auth::user()->discord_id
        ])->get();
    }

    private function fetchRecommendHistory()
    {
        return ServerRecommendation::where([
            'discord_id' => Auth::user()->discord_id
        ])->get();
    }
}
