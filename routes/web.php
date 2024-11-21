<?php

use App\Http\Controllers\EncuestaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Livewire\PollVote;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Ruta para el dashboard
    Route::get('/dashboard', function () {
        return view('dashboard'); // Asegúrate de que el contenido del dashboard se cargue aquí
    })->name('dashboard');

    // Rutas para las encuestas (CRUD)
    Route::resource('encuestas', EncuestaController::class);
});

Route::get('/polls/{poll}', PollVote::class)->name('polls.vote');
Route::post('encuestas/{id}/votar', [EncuestaController::class, 'votar'])->name('encuestas.votar');
