<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Character extends Model
{
    use HasFactory;
    
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

    public function scopeWithOutGuild($query)
    {
        $query->whereNotExists( function($query){
            $query->select('*')
                ->from('guild_characters')
                ->where('characters.id', DB::raw('guild_characters.character_id'));
        });

    }
}
