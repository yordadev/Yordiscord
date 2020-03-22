<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class ServerAccess extends Model
{
    protected $table = 'server_accesses';
    protected $primaryId = 'server_id';

    protected $fillable = [
        'server_id',
        'access_token',
        'expires_in',
        'refresh_token',
        'scope',
    ];

    protected $casts = [
        'discord_id'    => 'string',
        'access_token'  => 'string',
        'expires_in'    => 'integer',
        'refresh_token' => 'string',
        'scope'         => 'string',
    ];
}
