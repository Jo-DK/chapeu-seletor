<?php

use App\Http\Controllers\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\{
    Character
};

Route::apiResource('character', CharacterController::class);