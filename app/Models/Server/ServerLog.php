<?php

namespace App\Models\Server;

use App\Models\Account\User;
use Illuminate\Database\Eloquent\Model;

class ServerLog extends Model
{
    protected $fillable = [
        'server_id',
        'discord_id',
        'action'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'discord_id', 'discord_id');
    }
}
