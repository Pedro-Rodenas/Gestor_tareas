<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TareaController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
    Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
    Route::get('/tareas/{id}', [TareaController::class, 'show']);
    Route::put('/tareas/{id}', [TareaController::class, 'update'])->name('tareas.update');
    Route::delete('/tareas/{id}', [TareaController::class, 'destroy'])->name('tareas.destroy');
});


// Login tradicional
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Social logins
Route::get('/login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/login/twitch', [AuthController::class, 'redirectToTwitch']);
Route::get('/login/twitch/callback', [AuthController::class, 'handleTwitchCallback']);
