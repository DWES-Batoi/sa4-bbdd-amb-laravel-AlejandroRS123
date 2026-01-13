<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartitController;
use Illuminate\Support\Facades\Route;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (solo para usuarios verificados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Públicos: index y show
Route::resource('equips', EquipController::class)->only(['index', 'show']);
Route::resource('estadis', EstadiController::class)->only(['index', 'show']);
Route::resource('jugadors', JugadorController::class)->only(['index', 'show']);
Route::resource('partits', PartitController::class)->only(['index', 'show']);

// 🔒 Protegidos: crear, editar, borrar
Route::middleware('auth')->group(function () {

    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD protegido
    Route::resource('equips', EquipController::class)->except(['index', 'show']);
    Route::resource('estadis', EstadiController::class)->except(['index', 'show']);
    Route::resource('jugadors', JugadorController::class)->except(['index', 'show']);
    Route::resource('partits', PartitController::class)->except(['index', 'show']);
});

require __DIR__ . '/auth.php';
