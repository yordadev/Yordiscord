<?php

namespace App\Http\Controllers\Features;

use Illuminate\Http\Request;
use App\Models\Server\DiscordServer;
use Illuminate\Support\Facades\Auth;
use App\Models\Server\ServerTag;
use App\Http\Controllers\Controller;
use App\Models\Server\FeaturedServer;
use App\Traits\DiscordWrapper;

class ServerListing extends Controller
{
    use DiscordWrapper;
    protected $count = 0;
    //protected $channelMaxMessages  = 1000;
    protected $lastID = null;

    public function landingPage(Request $request)
    {
        dd($request);
        $data  = [];
        $data['listed_servers']   = $this->fetchServerListings();
        $data['featured_servers'] = $this->fetchFeaturedServers();

        $data['listed_servers'] = $this->gatherServerInfo($data['listed_servers']);

        return view('welcome', ['data' => $data]);
    }

    private function gatherServerInfo($listed_servers)
    {
        foreach ($listed_servers as $listed) {
            $server_id = $listed->server_id;

            $listed->channels = cache()->remember('guild-' . $server_id . '-channels', 120, function () use ($server_id) {
                return  $this->botClient()->guild->getGuildChannels(['guild.id' => (int) $server_id]);
            });

            $listed->roles = cache()->remember('guild-' . $server_id . '-roles', 30, function () use ($server_id) {
                return $this->botClient()->guild->getGuildRoles(['guild.id' => (int) $server_id]);
            });


            $listed->icon = cache()->remember('guild-' . $server_id . '-icon', 30, function () use ($server_id) {
                return $this->botClient()->guild->getGuild(['guild.id' => (int) $server_id])->icon;
            });

            $listed->members = cache()->remember('guild-' . $server_id . '-members', 120, function () use ($server_id) {
                $guildMembers = [];

                $exit = false;
                while (!$exit) {
                    if (!is_null($this->lastID)) {
                        $members = $this->botClient()->guild->listGuildMembers(['guild.id' => (int) $server_id, 'limit' => 1000]);
                    } else {
                        $members = $this->botClient()->guild->listGuildMembers(['guild.id' => (int) $server_id, 'limit' => 1000, 'after' => $this->lastID]);
                    }

                    $memberCount = collect($members)->count();
                    if ($memberCount <= 999) {
                        // 1000
                        $exit = true;
                        $this->count = $this->count + $memberCount;
                        foreach ($members as $member) {
                            array_push($guildMembers, $member);
                        }
                        break;
                    }
                    $this->count = $this->count + $memberCount;
                    foreach ($members as $member) {
                        array_push($guildMembers, $member);
                    }
                    $this->lastID = $members[$memberCount - 1]->user->id;
                }


                return $guildMembers;
            });
        }
        return $listed_servers;
    }

    private function fetchServerListings()
    {
        return cache()->remember('server_listings', 120, function () {
            return DiscordServer::get();
        });
    }

    private function fetchFeaturedServers()
    {
        return cache()->remember('featured_servers', 120, function () {
            return FeaturedServer::take(5)->get();
        });
    }

    public function listServer(Request $request)
    {
        $request->validate([
            'server_id' => 'required',
            'description' => 'required|string|min:8|max:255',
            'name' => 'required',
            'tags' => 'required|string|min:2|max:255'
        ]);

        if ($server = $this->ownsServer($request->server_id, Auth::user()->grantedAccess()->access_token)) {
            // owns the server
            // list server

            if (DiscordServer::where([
                'server_id' => $request->server_id
            ])->first()) {
                return redirect()->back()->withErrors(['Server is already listed.']);
            }

            DiscordServer::create([
                'discord_id'  => Auth::user()->discord_id,
                'server_id'   => $request->server_id,
                'name'        => $request->name,
                'description' => $request->description
            ]);

            $tags = explode(" ", $request->tags);
            $cnt = 0;
            foreach ($tags as $item) {
                if ($cnt === 0) {
                    ServerTag::create([
                        'server_id'  => $request->server_id,
                        'is_primary' => true,
                        'tag'        => ucfirst($item),
                    ]);
                    $cnt++;
                } else {
                    if ($cnt <= 3) {
                        ServerTag::create([
                            'server_id'  => $request->server_id,
                            'is_primary' => false,
                            'tag'        =>  ucfirst(strtolower($item)),
                        ]);
                        $cnt++;
                    }
                }
            }

            return redirect()->back()->with('success', 'Server successfully listed');
        }
        // doesn't own this server.. cannot list it.

        return redirect()->back()->withErrors(['Could not list the server.']);
    }
}
