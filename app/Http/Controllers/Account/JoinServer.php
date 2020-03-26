<?php

namespace App\Http\Controllers\Account;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Traits\DiscordWrapper;
use App\Models\Server\DiscordServer;
use Illuminate\Http\Request;

class JoinServer extends Controller
{
    use DiscordWrapper;

    public function process(Request $request, $server_id)
    {
       
        $request->validate([
            'server_id' => 'required|min:8|max:100'
        ]);

        if ($request->server_id !== $server_id) {
         
            return redirect()->back()->withErrors(['Whatcha doing mate?']);
        }

        $server = DiscordServer::where('server_id', $request->server_id)->first();
        if ($server) {
          
            return redirect()->to($server->inviteLink());
        }
   

        return redirect()->back()->withErrors(['Something went wrong.']);
    }


    public function getInviteLink()
    {
    }
}
