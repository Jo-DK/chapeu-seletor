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
    public function index()
    {
        $data = Character::all();
        
        return response()->json([
            'message' => 'List of Characters',
            'data' => $data
        ]);
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
    public function store(CharacterRequest $request)
    {

        $character = Character::create($request->validated());

        return response()->json([
            'message' => 'new Characters',
            'data' => $character
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return response()->json([
            'message' => 'Show Character',
            'data' => $character
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
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
