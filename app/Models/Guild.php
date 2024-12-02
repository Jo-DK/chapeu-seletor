<?php

namespace App\Models;

use Database\Factories\GuildFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Collection;
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

    public static function Fabricate(int $quantity)
    {
        $names = (new GuildFactory)->names;
 
        $guilds = new Collection();
        for($i = 1; $i <= $quantity; $i++){
            shuffle($names);
            $guilds->push(self::create(['name'=> array_pop($names)]));
        }

        return $guilds;
    }

}
