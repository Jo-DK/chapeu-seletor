<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistributeRequest;
use App\Http\Requests\GuildCharacterRequest;
use App\Models\GuildCharacter;
use App\Services\DistributesService;
use Illuminate\Http\Request;

class GuildCharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $distribute = new DistributesService($request->perGuild);
        $distribute->main();
    }
}
