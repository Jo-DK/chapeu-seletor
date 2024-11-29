<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\GuildController;
use Illuminate\Support\Facades\Route;

use App\Models\{
    Character,
    Guild
};

Route::apiResource('character', CharacterController::class);
Route::apiResource('guild', GuildController::class);