<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuildRequest;
use App\Models\Guild;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Guild::query()->with('guildCharacters')->get();
        
        return response()->json([
            'message' => 'List of Guilds',
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuildRequest $request)
    {
        $guilds = Guild::create($request->validated());

        return response()->json([
            'message' => 'New Guild',
            'data' => $guilds
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guild $guild)
    {
        $guild->characters;
        
        return response()->json([
            'message' => 'Show Guild',
            'data' => $guild
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuildRequest $request, Guild $guild)
    {
        $guild->update($request->validated());

        return response()->json([
            'message' => 'Guild updated',
            'data' => $guild
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guild $guild)
    {
        $guild->delete();

        return response()->json([
            'message' => 'Character Deleted',
            'data' => $guild
        ]);
    }
}
