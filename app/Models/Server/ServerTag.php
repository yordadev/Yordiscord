<?php

namespace App\Models\Server;

use App\Models\Server\DiscordServer;
use Illuminate\Database\Eloquent\Model;

class ServerTag extends Model
{
    protected $casts = [
        'server_id' => 'string',
        'tag_id'       => 'string'
    ];

    protected $fillable = [
        'server_id', 
        'is_primary',
        'tag_id'
    ];

    public function servers(){
        return $this->hasMany(DiscordServer::class, 'server_id', 'server_id');
    }

    public function info(){
        return $this->belongsTo(AvailableTag::class, 'tag_id', 'tag_id');
    }

    
}
