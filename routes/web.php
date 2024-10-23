<?php

use App\Http\Controllers\API\APIDocumentationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UserTokenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/tareas', TareaController::class)->names('tareas')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/api/documentation', [APIDocumentationController::class, 'index'])->name('api.documentation')->middleware('auth');
Route::post('/generar-token', [UserTokenController::class, 'generateToken'])->name('generar.token');
Route::delete('/eliminar-token/{token}', [UserTokenController::class, 'deleteToken'])->name('eliminar.token');

require __DIR__.'/auth.php';
