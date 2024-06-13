<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PersonaController;

Route::get('/', [PublicController::class, 'home'])->name ('home');

Route::prefix('events')->group(function(){
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/', [EventController::class, 'store'])->name('events.store');
    Route::get('/show/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::prefix('personas')->group(function(){
    Route::get('/create', [PersonaController::class, 'create'])->name('personas.create');
    Route::post('/', [PersonaController::class, 'store'])->name('personas.store');
    Route::get('/{persona}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
    Route::put('/{persona}', [PersonaController::class, 'update'])->name('personas.update');
    Route::delete('/{persona}', [PersonaController::class, 'destroy'])->name('personas.destroy');
});

