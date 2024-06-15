<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiEventController;
use App\Http\Controllers\Api\ApiPersonaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/events', [ApiEventController::class, 'index']);
Route::get('/events/{event}', [ApiEventController::class, 'show']);
Route::post('/events', [ApiEventController::class, 'store']);
Route::put('/events/{event}', [ApiEventController::class, 'update']);
Route::delete('/events/{event}', [ApiEventController::class, 'destroy']);
//Adding removing personas fom events routes
Route::post('/events/{event}/add-persona', [ApiEventController::class, 'addPersona']);
Route::delete('/events/{event}/remove-persona/{persona}', [ApiEventController::class, 'removePersona']);


Route::get('/personas', [ApiPersonaController::class, 'index']);
Route::get('/personas/{persona}', [ApiPersonaController::class, 'show']);
Route::post('/personas', [ApiPersonaController::class, 'store']);
Route::put('/personas/{persona}', [ApiPersonaController::class, 'update']);
Route::delete('/personas/{persona}', [ApiPersonaController::class, 'destroy']);