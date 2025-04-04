<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class)->except(['update']);
    Route::patch('users/{user}', [UserController::class, 'update']);
});
