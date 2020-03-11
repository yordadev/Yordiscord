<?php

namespace App\Http\Controllers\Features;

use Illuminate\Http\Request;
use App\Traits\DiscordWrapper;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class Whois extends Controller
{
    use DiscordWrapper;

    protected $count = 0;
    //protected $channelMaxMessages  = 1000;
    protected $lastID = null;

    public function user(Request $request, $guild_id, $discord_id)
    {

        $data = [];

        return view('features.whois.results', ['data' => $data]);
    }

    public function guild(Request $request, $guild_id)
    {

        // 275377268728135680 - Codeforge
        // 364442543804514306 - yorda's space
        //1000) 

 

        /*


        way to slow -- save this for whois user fetch
        $messageInsights = [];
        foreach ($channels as $channel) {
            $exit = false;
            while (!$exit && $this->channelMaxMessages !== $this->channelMessageCount) {
                if(isset($this->lastMessageID)){
                    $messages = $this->botClient()->channel->getChannelMessages([
                        'channel.id' => $channel->id,
                        'limit'      => 100
                    ]);
                }else {
                    $messages = $this->botClient()->channel->getChannelMessages([
                        'channel.id' => $channel->id,
                        'before'     => $this->lastMessageID,
                        'limit'      => 100
                    ]);
                }
             
                // count how many are in response
                if ($msgCount = collect($messages)->count() <= 99) {
                    // last call.. end of the line
                    $this->channelMessageCount = $this->channelMessageCount + $msgCount;
                    $exit = true;
                    break;
                }
                
                // full response
                $this->channelMessageCount = $this->channelMessageCount + 100;
                $this->lastMessageID = $messages[99]->id;
            }
            array_push($messageInsights, [
                'channel_id' => $channel->id,
                'messages'   => $this->channelMessageCount
            ]);
        }
        */

        $data = [
            'guild'    => cache()->remember('guild-' . $guild_id . '-info', 30, function () use ($guild_id) {
                return $this->botClient()->guild->getGuild(['guild.id' => (int) $guild_id]);
            }),
            'channels' => cache()->remember('guild-' . $guild_id . '-channels', 30, function () use ($guild_id) {
                return  $this->botClient()->guild->getGuildChannels(['guild.id' => (int) $guild_id]);
            }),
            'members'  => cache()->remember('guild-' . $guild_id . '-members', 30, function () use ($guild_id) {
                $guildMembers = [];

                $exit = false;
                while (!$exit) {
                    if (!is_null($this->lastID)) {
                        $members = $this->botClient()->guild->listGuildMembers(['guild.id' => (int) $guild_id, 'limit' => 1000]);
                    } else {
                        $members = $this->botClient()->guild->listGuildMembers(['guild.id' => (int) $guild_id, 'limit' => 1000, 'after' => $this->lastID]);
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
            }),
            'roles'    => cache()->remember('guild-' . $guild_id . '-roles', 30, function () use ($guild_id) {
                return $this->botClient()->guild->getGuildRoles(['guild.id' => (int) $guild_id]);
            }),
            'widget'   => 'https://discordapp.com/api/guilds/' . $guild_id . '/widget.png?style=banner2'
        ];

        
        
        return view('features.whois.results', ['data' => $data]);
    }
}
