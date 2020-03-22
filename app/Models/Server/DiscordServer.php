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
        'server_id' => 'string',
        'description' => 'longText'
    ];

    protected $fillable = [
        'discord_id',
        'server_id',
        'name',
        'description'
    ];

    public function is_featured(){
        if($this->hasOne(FeaturedServer::class, 'server_id', 'server_id')){
            return true;
        }
        return false;
    }

    public function recommendations(){
        return $this->hasMany(ServerRecommendation::class, 'server_id', 'server_id');
    }

    public function tags(){
        return $this->hasMany(ServerTag::class, 'server_id', 'server_id');
    }

    public function access(){
        return $this->hasOne(DiscordAccess::class, 'discord_id', 'discord_id');
    }
}
