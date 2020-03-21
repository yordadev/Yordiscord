<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Server\ServerRecommendation;


class RecommendServer extends Controller
{
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
}
