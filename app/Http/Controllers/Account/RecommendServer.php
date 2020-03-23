<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Models\Server\DiscordServer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Server\ServerRecommendation;
use App\Traits\DiscordWrapper;

class RecommendServer extends Controller
{
    use DiscordWrapper;

    public function process(Request $request)
    {
        $request->validate([
            'server_id' => 'required',
            'testimony' => 'nullable|string|min:6|max:255'
        ]);

        if($this->canRecommend($request->server_id)){
            try {
                ServerRecommendation::create([
                    'discord_id' => Auth::user()->discord_id,
                    'server_id'  => $request->server_id,
                    'testimony'  => $request->testimony ?? null,
                    'recommended'  => true
                ]);
        
                return redirect()->back()->with('success', 'You have successfully recommended the server.');
            } catch (\Exception $e){        
                return redirect()->back()->withErrors(['Something went wrong trying to recommend this server.']);
            }
        }

        if($this->isNotListed($request->server_id)){
            // server is not listed..
            // list server for owner
            return redirect()->back()->withErrors(['The server cannot be recommended until the server owner lists it.']);
        }
        
        return redirect()->back()->withErrors(['You have already recommended this server, thanks.']);
    }

    private function canRecommend($server_id){
        if(ServerRecommendation::where([
            'discord_id' => Auth::user()->discord_id,
            'server_id'  => $server_id,
        ])->first()){
            return false;
        }
        return true;
    }

    private function isNotListed($server_id){
        if(DiscordServer::where([
            'server_id' => $server_id
        ])->first()){
            return false;
        }
        return true;
    }
}
