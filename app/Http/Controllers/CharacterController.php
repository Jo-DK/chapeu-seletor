<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Character::query();

        if($request->withoutguild)
            $data->WithOutGuild();
        
        return response()->json([
            'message' => 'List of Characters',
            'data' => $data->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CharacterRequest $request)
    {
        $character = Character::create($request->validated());

        return response()->json([
            'message' => 'new Characters',
            'data' => $character
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        $character->guild;
        
        return response()->json([
            'message' => 'Show Character',
            'data' => $character
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CharacterRequest $request, Character $character)
    {
        $character->update($request->validated());

        return response()->json([
            'message' => 'Character updated',
            'data' => $character
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();

        return response()->json([
            'message' => 'Character Deleted',
            'data' => $character
        ]);
    }
}
