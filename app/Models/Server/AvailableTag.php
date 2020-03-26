<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class AvailableTag extends Model
{
    protected $fillable = [
        'tag_id',
        'tag'
    ];

    public function used_by(){
        return $this->hasMany(ServerTag::class, 'tag_id', 'tag_id')->get();
    }
}
