<?php

namespace App\Models\Account;

use App\Models\Server\DiscordServer;
use App\Models\Account\DiscordAccess;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar',
        'username',
        'email',
        'discord_id',
        'discriminator',
        'verified',
        'locale',
        'mfa_enabled',
        'flags',
        'premium_type'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'avatar' => 'string',
        'username' => 'string',
        'email' => 'string',
        'discord_id' => 'string',
        'discriminator' => 'string',
        'verified' => 'boolean',
        'locale' => 'string',
        'mfa_enabled' => 'boolean',
        'flags' => 'integer',
        'premium_type' => 'integer'
    ];

    public function grantedAccess()
    {
        return $this->hasOne(DiscordAccess::class, 'discord_id', 'discord_id')->first();
    }

    public function listedServers(){
        return $this->hasMany(DiscordServer::class, 'discord_id', 'discord_id');
    }
}
