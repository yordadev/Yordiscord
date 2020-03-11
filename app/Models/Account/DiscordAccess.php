<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class DiscordAccess extends Model
{
    protected $table = 'discord_accesses';
    protected $primaryId = 'discord_id';

    protected $fillable = [
        'discord_id',
        'access_token',
        'expires_in',
        'refresh_token',
        'scope',
        'token_type'
    ];

    protected $casts = [
        'discord_id'    => 'string',
        'access_token'  => 'string',
        'expires_in'    => 'integer',
        'refresh_token' => 'string',
        'scope'         => 'string',
        'token_type'    => 'string'
    ];
}
