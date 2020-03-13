<?php

namespace App\Models\Server;

use App\Models\Server\DiscordServer;
use Illuminate\Database\Eloquent\Model;

class FeaturedServer extends Model
{
    protected $casts = [
        'server_id' => 'string'
    ];

    protected $fillable = [
        'serverr_id'
    ];

    public function information(){
        return $this->belongsTo(DiscordServer::class, 'server_id' ,'server_id');
    }
}
