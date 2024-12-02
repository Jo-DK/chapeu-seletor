<?php

namespace App\Services;

use App\Models\Character;
use App\Models\Guild;
use App\Models\GuildCharacter;
use App\Services\Ideals\AttackDamageCarry;
use App\Services\Ideals\Support;
use App\Services\Ideals\Tanker;
use Illuminate\Database\Eloquent\Collection;
class DistributesService
{
    public Collection $characters;

    public Collection $guilds;
    /**
     * Create a new class instance.
     */
    public function __construct(protected int $perGuild)
    {
        $this->characters = Character::query()->orderBy('xp', 'desc')->get();
        $this->guilds = $this->createGuilds();
    }

    public function main()
    {
        /** Aqui eu distribuo primeiro os Cléricos nas guildas, 
         * para tentar garantir que fiquem com pelo menos um */
        (new Support($this))->distribute();

        /* O mesmo para Guerreiro 'tanker' */
        (new Tanker($this))->distribute();

        /* E depois para os ADC, personagens de danos a distancia como  Mago ou Arqueiro*/
        (new AttackDamageCarry($this))->distribute();

        $this->distributeTheRest();
    }

    /** 
     * Aqui distribuímos o restante dos personagens,
     * sempre adicionando o personagem com maior XP na Guilda com menor soma de XP
     * para manter o balanceamento */
    private function distributeTheRest()
    {
        $this->guildsReorder();
        foreach ($this->guilds as $guild) {
            if ($this->characters->count() == 0)
                return;

            $characterWithHighestXp = $this->characters->shift();
            GuildCharacter::Vinculate($guild, $characterWithHighestXp);
        }

        $this->distributeTheRest();
    }

    private function createGuilds()
    {

        $guildsQuant = $this->guildsQuantity();
        return Guild::Fabricate($guildsQuant);
    }

    /** Com a quantidade mínima solicitada para cada Guilda, 
     * faço a divisão para descrobrir quantas Guildas preciso cadastrar  */
    private function guildsQuantity(): int
    {
        return ceil($this->characters->count() / $this->perGuild);
    }

    /** É importante que as guildas estejam ordenadas pelo xp, 
     * interendo sempre o menor primeiro, para garantir o equilibrio das Guildas
    */
    public function guildsReorder()
    {
        $this->guilds = $this->guilds->sortBy('initial_xp');
    }
}
