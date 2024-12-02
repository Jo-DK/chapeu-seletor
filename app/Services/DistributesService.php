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
        (new Support($this))->distribute();

        (new Tanker($this))->distribute();

        (new AttackDamageCarry($this))->distribute();

        $this->distributeTheRest();
    }

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

    public function createGuilds()
    {

        $guildsQuant = $this->guildsQuantity();
        return Guild::factory($guildsQuant)->create();
    }

    public function guildsQuantity(): int
    {
        return ceil($this->characters->count() / $this->perGuild);
    }

    public function guildsReorder()
    {
        $this->guilds = $this->guilds->sortBy('initial_xp');
    }
}
