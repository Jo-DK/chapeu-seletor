<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class GuildCharacter extends Model
{
    protected $fillable = [
        'character_id',
        'guild_id'
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


    public function guild()
    {
        return $this->belongsTo(Guild::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
