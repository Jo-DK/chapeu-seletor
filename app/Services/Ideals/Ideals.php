<?php

namespace App\Services\Ideals;

use App\Models\GuildCharacter;
use App\Services\DistributesService;

abstract class Ideals
{
    public array $allowClasses;
    public array $guilds;
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
        if($this->service->characters)
            foreach( $this->service->characters as $c => $char)
            {
                if(in_array($char->class, $this->allowClasses)){
                    unset($this->service->characters[$c]);
                    return $char;
                }
            }
    }


}
