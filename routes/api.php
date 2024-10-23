<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TareaController;
use App\Http\Controllers\API\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('tareas', TareaController::class)->names('api.tareas');
});

Route::apiResource('users', UserController::class)->names('api.users');