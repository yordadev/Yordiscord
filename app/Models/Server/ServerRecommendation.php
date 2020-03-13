<?php

namespace App\Models\Server;

use App\Models\Account\User;
use App\Models\Server\DiscordServer;
use Illuminate\Database\Eloquent\Model;

class ServerRecommendation extends Model
{
    protected $casts = [
        'discord_id' => 'string',
        'server_id'  => 'string',
        'testimony'  => 'string',
        'recommended' => 'boolean'
    ];

    protected $fillable = [
        'discord_id',
        'server_id',
        'testimony',
        'recommended'
    ];

    public function discordUser(){
        return $this->belongsTo(User::class, 'discord_id', 'discord_id');
    }

    public function server(){
        return $this->belongsTo(DiscordServer::class, 'server_id', 'server_id');
    }
}
