<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guild extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'initial_xp'
    ];

    protected $with = ['characters'];


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

    public function characters()
    {
        // 'select * from character on guildcharacter on '
        return $this->hasManyThrough(Character::class, GuildCharacter::class, 'guild_id', 'id',  'id', 'character_id');
    }
}
