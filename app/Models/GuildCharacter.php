<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuildCharacter extends Model
{
    protected $fillable = [
        'character_id',
        'guild_id'
    ];
}
