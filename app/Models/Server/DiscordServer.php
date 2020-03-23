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

    public function recommendations()
    {
        return $this->hasMany(ServerRecommendation::class, 'server_id', 'server_id');
    }

    public function tags()
    {
        return $this->hasMany(ServerTag::class, 'server_id', 'server_id');
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
