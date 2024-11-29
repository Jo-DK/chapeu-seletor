<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name', 
        'class',
        'xp'
    ];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d/m/Y H:i:s');
    }

    public function Guild()
    {
        return $this->hasOneThrough(Guild::class, GuildCharacter::class, 'character_id', 'id', 'id', 'guild_id');
    }
}
