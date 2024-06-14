<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PersonaController;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::prefix('events')->group(function () {
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/', [EventController::class, 'store'])->name('events.store');
    Route::get('/show/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    //Adding/removing personas routes
    Route::post('/{event}/add_persona', [EventController::class, 'addPersona'])->name('events.add_persona');
    Route::delete('/{event}/remove_persona/{persona}', [EventController::class, 'removePersona'])->name('events.remove_persona');
});

Route::prefix('personas')->group(function () {
    Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
    Route::get('/create', [PersonaController::class, 'create'])->name('personas.create');
    Route::post('/', [PersonaController::class, 'store'])->name('personas.store');
    Route::get('/{persona}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
    Route::put('/{persona}', [PersonaController::class, 'update'])->name('personas.update');
    Route::delete('/{persona}', [PersonaController::class, 'destroy'])->name('personas.destroy');
});
