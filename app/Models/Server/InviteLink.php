<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class InviteLink extends Model
{
    protected $fillable = [
        'server_id',
        'channel_id',
        'code',
        'uses'
    ];

    protected $casts = [
        'server_id' => 'string',
        'channel_id' => 'string',
        'code'       => 'string',
        'uses'       => 'integer'
    ];

    public function for(){
        return $this->belongsTo(DiscordServer::class, 'server_id', 'server_id');
    }
}
