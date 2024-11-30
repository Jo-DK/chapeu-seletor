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


    public static function Vinculate(Guild $guild, Character $character)
    {
        self::create([
            'guild_id' => $guild->id,
            'character_id' => $character->id
        ]);

        $guild->initial_xp += $character->xp;
        $guild->save();
    }
}
