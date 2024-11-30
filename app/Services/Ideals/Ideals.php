<?php

namespace App\Services\Ideals;

use App\Models\GuildCharacter;
use App\Services\DistributesService;

abstract class Ideals
{
    public array $allowClasses;
    /**
     * Create a new class instance.
     */
    public function __construct(protected DistributesService $service)
    {}

    public function distribute()
    {
        $this->service->guildsReorder();

        foreach($this->service->guilds as $guild){
            if($support = $this->getCharacter())
                GuildCharacter::Vinculate($guild, $support);
        }
    }
 

    protected function getCharacter()
    {
        $characters = $this->service->characters;

        if($characters->count())
            foreach( $characters as $c => $char)
            {
                if(in_array($char->class, $this->allowClasses)){
                    return $characters->pull($c);
                }
            }
    }


}
