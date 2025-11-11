<?php

use App\Http\Controllers\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('tareas', TareaController::class);
