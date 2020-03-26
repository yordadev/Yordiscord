<?php

namespace App\Models\Server;

use App\Models\Server\ServerTag;
use App\Models\Server\FeaturedServer;
use App\Models\Account\DiscordAccess;
use App\Models\Server\ServerRecommendation;
use Illuminate\Database\Eloquent\Model;

class DiscordServer extends Model
{
    protected $casts = [
        'server_id'   => 'string',
        'name'        => 'string',
        'listed'      => 'boolean',
        'code'        => 'string',
        'description' => 'longText'
    ];

    protected $fillable = [
        'discord_id',
        'server_id',
        'listed',
        'name',
        'banner_url',
        'code',
        'description'
    ];

    public function is_featured()
    {
        if (FeaturedServer::where('server_id', $this->server_id)->first()) {
            return true;
        }
        return false;
    }

    public function listed_servers(){
        return DiscordServer::where([
            'discord_id' => $this->discord_id,
            'listed'    => true
        ])->get();
    }

    public function recommendations()
    {
        return $this->hasMany(ServerRecommendation::class, 'server_id', 'server_id');
    }

    public function tags()
    {
        return $this->hasMany(ServerTag::class, 'server_id', 'server_id');
    }

    public function primary_tag()
    {
        return ServerTag::where([
            'server_id' => $this->server_id,
            'is_primary' => true
        ])->first();
    }

    public function has_additional_tags(){
        $check = ServerTag::where([
            'server_id' => $this->server_id,
            'is_primary' => false
        ])->count();
        if($check > 0){
            return true;
        }
        return false;
    }


    public function additional_tags(){
        return ServerTag::where([
            'server_id' => $this->server_id,
            'is_primary' => false
        ])->get();
    }

    public function access()
    {
        return $this->hasOne(DiscordAccess::class, 'discord_id', 'discord_id');
    }

    public function inviteLink()
    {
        return 'https://discord.gg/' . $this->code;
    }

    public function checkInviteLink()
    {
        if ($inviteCheck = $this->sendAPIRequest('GET', 'invites/' . $this->code, [], [])) {
            if ($inviteCheck->guild->id = $this->server_id) {
                return true;
            }
        }
        return false;
    }
}
