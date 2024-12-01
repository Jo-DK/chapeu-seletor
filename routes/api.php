<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\GuildCharacterController;
use App\Http\Controllers\GuildController;
use Illuminate\Support\Facades\Route;

use App\Models\{
    Character,
    Guild,
    GuildCharacter
};

Route::apiResource('character', CharacterController::class);
Route::apiResource('guild', GuildController::class);

Route::apiResource('guild-character', GuildCharacterController::class)->except(['show', 'index']);

Route::post('distribute-characters', [GuildCharacterController::class, 'distributeCharacters']);
