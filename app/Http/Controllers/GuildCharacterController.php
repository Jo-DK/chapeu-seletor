<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuildCharacterRequest;
use App\Models\GuildCharacter;
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
     * Display the specified resource.
     */
    public function show(GuildCharacter $guildCharacter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuildCharacter $guildCharacter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuildCharacter $guildCharacter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuildCharacter $guildCharacter)
    {
        //
    }
}
