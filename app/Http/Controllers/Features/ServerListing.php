<?php

namespace App\Http\Controllers\Features;

use Illuminate\Http\Request;
use App\Models\Server\DiscordServer;
use Illuminate\Support\Facades\Auth;
use App\Models\Server\ServerTag;
use App\Http\Controllers\Controller;
use App\Models\Server\FeaturedServer;
use App\Traits\DiscordWrapper;
use App\Models\Server\AvailableTag;

class ServerListing extends Controller
{
    use DiscordWrapper;
    protected $count = 0;
    //protected $channelMaxMessages  = 1000;
    protected $lastID = null;

    public function landingPage(Request $request)
    {
        $data  = [];
        $data['listed_servers']   = $this->fetchServerListings();

        $data['featured_servers'] = $this->fetchFeaturedServers();
        $data['listed_servers']   = $this->gatherServerInfo($data['listed_servers']);
        $data['tags']             = $this->fetchTags();
        $data['tagger']           = '';
        $data['empty-tagger']     = $this->createEmptyTagListString($data['tags']);


        return view('welcome', ['data' => $data]);
    }

    public function searchListings(Request $request){
        $request->validate([
            'q' => 'required|string|max:255|min:2'
        ]);

        $results = [];
        $servers = DiscordServer::where('name', 'like', '%' . $request->q . '%')->orWhere('description', 'like', '%' . $request->q . '%')->get();

        foreach($servers as $server){
            array_push($results, $server);
        }

        $tags    = AvailableTag::where('tag', 'like', '%' . $request->q . '%')->get();
        foreach($tags as $tag){
            foreach($tag->used_by() as $server){
                
               array_push($results, $server->server());
            }
        }
        
        return view('results', ['data' => [ 'tags' => []], 'results'=> $this->gatherServerInfo($results), 'q' => $request->q]);

    }

    public function updateListing(Request $request)
    {
        $request->validate([
            'server_id' => 'required',
            'description' => 'required|string|min:8|max:255',
            'name' => 'required',
            'banner_url' => 'required|string',
            'code' => 'required|string|max:10|min:5',
            'primary_tag' => 'required|string|min:2|max:255',
            'bonus_additional_1' => 'nullable|string|min:2|max:255',
            'bonus_additional_2' => 'nullable|string|min:2|max:255'
        ]);

        if ($server = DiscordServer::where([
            'discord_id' => Auth::user()->discord_id,
            'server_id'  => $request->server_id
        ])->first()) {

            $server->name = $request->name ?? $server->name;
            $server->code = $request->code ?? $server->code;
            $server->banner_url = $request->banner_url ?? $server->banner_url;
            $server->description = $request->description ?? $server->description;
            $server->save();

            $this->updateOrStoreTags($request->server_id, $request->primary_tag, $request->bonus_additional_1 ?? null, $request->bonus_additional_2 ?? null);
            return redirect()->back()->with('success', 'Server listing has been updated.');
        }


        return redirect()->back()->withErrors(['Something went wrong and we could not update your listing.']);
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
            $listed->taggers = $this->generateTagString($listed);
        }

        return $listed_servers;
    }

    private function generateTagString($server)
    {
        $settags = '';

        $settags = 'all-tags';
        foreach ($server->tags as $tag) {
            $settags = 'tag-' . $tag->info->tag . ' ' . $settags;
        }
        if ($server->is_featured()) {
            $settags = 'tag-featured ' . $settags;
        }
        return $settags;
    }


    private function fetchServerListings()
    {
        return cache()->remember('server_listings', 120, function () {
            return DiscordServer::where('listed', true)->get();
        });
    }

    private function fetchFeaturedServers()
    {
        return cache()->remember('featured_servers', 120, function () {
            return FeaturedServer::take(5)->get();
        });
    }

    private function fetchTags()
    {
        return cache()->remember('available_tags', 60, function () {
            $tagInfo = [
                'tag_id' => null,
                'tag'    => null,
                'count'  => 0
            ];
            $availableTags = AvailableTag::get();

            foreach ($availableTags as $available) {
                if ($available->tag == trim($available->tag) && strpos($available->tag, ' ') !== false) {
                    $available->tag = preg_replace('/\s+/', '-', $available->tag);
                }
                $available->count = ServerTag::where('tag_id', $available->tag_id)->get()->count();
            }

            return $availableTags;
        });
    }

    private function createEmptyTagListString($tags)
    {
        $noListingTaggers = '';
        foreach ($tags as $tag) {
            if ($tag->count < 1) {
                if ($tag->tag == trim($tag->tag) && strpos($tag->tag, ' ') !== false) {
                    $tag->tag = preg_replace('/\s+/', '-', $tag->tag);
                    $tagString = 'tag-' . $tag->tag;
                    $noListingTaggers = $tagString . ' ' . $noListingTaggers;
                } else {
                    $noListingTaggers = 'tag-' . $tag->tag . ' ' . $noListingTaggers;
                }
            }
        }

        return $noListingTaggers;
    }

    public function listServer(Request $request)
    {
        $request->validate([
            'server_id' => 'required',
            'description' => 'required|string|min:8|max:255',
            'name' => 'required',
            'banner_url' => 'required|string',
            'code' => 'required|string|max:10|min:5',
            'primary_tag' => 'required|string|min:2|max:255',
            'bonus_additional_1' => 'nullable|string|min:2|max:255',
            'bonus_additional_2' => 'nullable|string|min:2|max:255'
        ]);

        if ($request->primary_tag === 'Select a Primary Tag') {
            return redirect()->back()->withErrors(['Please select a primary tag for your server listing.']);
        }
        if ($server = $this->ownsServer($request->server_id, Auth::user()->grantedAccess()->access_token)) {
            // owns the server
            // list server

            if (DiscordServer::where([
                'server_id' => $request->server_id
            ])->first()) {
                return redirect()->back()->withErrors(['Server is already listed.']);
            }

            // validate invite code

            if ($inviteCheck = $this->sendAPIRequest('GET', 'invites/' . $request->code, [], [])) {
                if ($inviteCheck->guild->id = $request->server_id) {
                    // yepp invite code for this server


                    DiscordServer::create([
                        'discord_id'  => Auth::user()->discord_id,
                        'server_id'   => $request->server_id,
                        'name'        => $request->name,
                        'code'        => $request->code,
                        'banner_url'  => $request->banner_url,
                        'description' => $request->description
                    ]);

                    $this->updateOrStoreTags($request->server_id, $request->primary_tag, $request->bonus_additional_1 ?? null, $request->bonus_additional_2 ?? null);


                    $redirectURL = $this->listServerOAuthRedirectURL($request->server_id, Auth::user()->discord_id);
                    return redirect()->to($redirectURL);
                }
            }

            return redirect()->back()->withErrors('Invalid Invite code. Ensure you are not giving the full invite url and only the code.');
        }
        // doesn't own this server.. cannot list it.

        return redirect()->back()->withErrors(['Could not list the server.']);
    }

    private function updateOrStoreTags($server_id, $primary, $bonusAd1, $bonusAd2)
    {
        if (!is_null($primary)) {
            $primaryCheck = AvailableTag::where('tag_id', $primary)->first();
            if ($primaryCheck) {
                // validate primary tag_id
                if ($tag = ServerTag::where([
                    'server_id' => $server_id,
                    'is_primary' => true
                ])->first()) {
                    // tag already set -- update the primary tag
                    $tag->tag_id = $primary;
                    $tag->save();
                } else {
                    // tag never create for primary
                    // create the record
                    ServerTag::create([
                        'server_id' => $server_id,
                        'is_primary' => true,
                        'tag_id'     => $primary
                    ]);
                }
            }
        }

        // check if bonus tag set

        if (!is_null($bonusAd1)) {
            $checkTag = AvailableTag::where('tag_id', $bonusAd1)->first();

            if ($checkTag) {
                // validate primary tag_id
                if ($tag = ServerTag::where([
                    'server_id' => $server_id,
                    'is_primary' => false,
                    'tag_id'    => $bonusAd1,
                ])->first()) {
                    // tag already set -- update the primary tag
                    $tag->tag_id = $checkTag->tag_id;
                    $tag->save();
                } else {
                    // tag never create for primary
                    // create the record
                    ServerTag::create([
                        'server_id' => $server_id,
                        'tag_id'     => $checkTag->tag_id
                    ]);
                }
            }
        }

        if (!is_null($bonusAd2)) {
            $checkTag = AvailableTag::where('tag_id', $bonusAd2)->first();

            if ($checkTag) {
                // validate primary tag_id
                if ($tag = ServerTag::where([
                    'server_id' => $server_id,
                    'tag_id'    => $bonusAd2,
                    'is_primary' => false
                ])->first()) {
                    // tag already set -- update the primary tag
                    $tag->tag_id = $checkTag->tag_id;
                    $tag->save();
                } else {
                    // tag never create for primary
                    // create the record
                    ServerTag::create([
                        'server_id' => $server_id,
                        'tag_id'     => $checkTag->tag_id
                    ]);
                }
            }
        }
    }
}
