<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class AvailableTag extends Model
{
    protected $fillable = [
        'tag_id',
        'tag'
    ];
}
