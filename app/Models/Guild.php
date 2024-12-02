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

    private static $names = [
        'Ring Society', 'Power Rangers', 'Knights of the Round Table', 'Gryffindor', 'Ravenclaw', 'Hufflepuff', 'Slytherin',
        'Hellfire Club', 'Granddaughters of the Old Barreiro', 'Winterfell Wolves', 'Targarian Dragons', 'Casterly Lions', 'Chicago Bulls',
        'Hells Angels MC', 'Gang Of Four', 'Bob\'s Nephews', 'Rebel Alliance', 'The Dark Side', 'WeatherLight Crew', 'The Highlanders', 'The Avengers',
        'Llanowar Elves', 'Blind Guardians', 'The Children of Asgard', 'Theatres des Vampires', 'Clã Namikaze'
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

    /** 
     * Ocorre um bug no Heroku quando uso as Factors nativas do Laravel,
     * por isso implementei a minha própria
     */
    public static function Fabricate(int $quantity)
    {
        $names = self::$names;
        $guilds = new Collection();
        for($i = 1; $i <= $quantity; $i++){
            shuffle($names);
            $guilds->push(self::create(['name'=> array_pop($names)]));
        }

        return $guilds;
    }

}
