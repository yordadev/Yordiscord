<?php

namespace App\Models\Server;

use App\Models\Server\DiscordServer;
use Illuminate\Database\Eloquent\Model;

class ServerTag extends Model
{
    protected $casts = [
        'server_id' => 'string',
        'tag'       => 'string'
    ];

    protected $fillable = [
        'server_id', 
        'is_primary',
        'tag'
    ];

    public function servers(){
        return $this->hasMany(DiscordServer::class, 'server_id', 'server_id');
    }
}
