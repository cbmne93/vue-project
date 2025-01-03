<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/genero', GeneroController::class)->names('genero');
    Route::resource('/empleado', EmpleadoController::class)->names('empleado');
    Route::resource('/cargo', CargoController::class)->names('cargo');

});

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('/genero', GeneroController::class);
})->name('genero'); */

/* Route::get('/genero', [GeneroController::class, 'index'])->name('genero.index');
Route::post('/genero', [GeneroController::class, 'store'])->name('genero.store');
Route::get('/genero/create', [GeneroController::class, 'create'])->name('genero.create');
Route::get('/genero/{genero}', [GeneroController::class, 'show'])->name('genero.show');
Route::put('/genero/{genero}', [GeneroController::class, 'update'])->name('genero.update');
Route::delete('/genero/{genero}', [GeneroController::class, 'destroy'])->name('genero.destroy');
Route::get('/genero/{genero}/edit', [GeneroController::class, 'edit'])->name('genero.edit'); */
