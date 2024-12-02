<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guild extends Model
{
    /** @use HasFactory<\Database\Factories\GuildFactory> */
    use HasFactory;
    
    protected $fillable = [
        'name',
        'initial_xp'
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

    public function guildCharacters()
    {
        return $this->hasMany(GuildCharacter::class)->with('character');
    }

}
