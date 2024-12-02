<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistributeRequest;
use App\Http\Requests\GuildCharacterRequest;
use App\Models\Character;
use App\Models\Guild;
use App\Models\GuildCharacter;
use App\Services\DistributesService;
use Illuminate\Http\Request;

class GuildCharacterController extends Controller
{

    public function update(GuildCharacterRequest $request, GuildCharacter $guildCharacter)
    {

        $guildCharacter->guild_id = $request->guild_id;
        $guildCharacter->save();

        $guildCharacter->guild;
        $guildCharacter->character;

        return response() ->json([
            'message' => 'Update Guild of Character',
            'data' => $guildCharacter
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuildCharacterRequest $request)
    {
        $guildCharacter = GuildCharacter::create($request->validated());
        $guildCharacter->character;
        $guildCharacter->guild;

        return response()->json([
            'message' => 'Character Add to the Guild',
            'data' => $guildCharacter
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuildCharacter $guildCharacter)
    {
        $guildCharacter->delete();

        return response()->json([
            'message' => 'Character removed of the guild',
            'data' => $guildCharacter
        ]);
    
    }


    /**
     * distributes all characters into balanced guilds
     */
    public function distributeCharacters(DistributeRequest $request)
    {
        $distribute = new DistributesService($request->per_guild);
        $distribute->main();

        return response()->json([
            'message' => 'Character removed of the guild',
            'data' => 'Success'
        ]);
    }

    public function reset()
    {
        Guild::query()->delete();
        Character::query()->delete();

        return response()->json([
            'message' => 'Cleaning database',
            'data' => 'Success'
        ]);
    }
}
