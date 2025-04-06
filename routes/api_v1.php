<?php

use App\Http\Controllers\Api\V1\PetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

Route::get('pets', [PetController::class, 'index']);
Route::get('pets/{reference_id}', [PetController::class, 'show'])->name('pets.show');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class)->except(['update']);
    Route::patch('users/{user}', [UserController::class, 'update']);

    Route::apiResource('pets', PetController::class)->except(['update', 'show', 'index']);
    Route::patch('pets/{pet}', [PetController::class, 'update']);
});
