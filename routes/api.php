<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JugadorController;
use App\Http\Controllers\Api\PartitController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Ruta protegida para obtener el usuario autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas de autenticación
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Rutas protegidas (requieren token de Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    // Endpoints de escritura para Jugador
    Route::post('jugadors', [JugadorController::class, 'store'])->name('api.jugadors.store');
    Route::put('jugadors/{jugador}', [JugadorController::class, 'update'])->name('api.jugadors.update');
    Route::delete('jugadors/{jugador}', [JugadorController::class, 'destroy'])->name('api.jugadors.destroy');

    // Endpoints de escritura para Partit
    Route::post('partits', [PartitController::class, 'store'])->name('api.partits.store');
    Route::put('partits/{partit}', [PartitController::class, 'update'])->name('api.partits.update');
    Route::delete('partits/{partit}', [PartitController::class, 'destroy'])->name('api.partits.destroy');
});

// Endpoints públicos de lectura para Jugador
Route::get('jugadors', [JugadorController::class, 'index'])->name('api.jugadors.index');
Route::get('jugadors/{jugador}', [JugadorController::class, 'show'])->name('api.jugadors.show');

// Endpoints públicos de lectura para Partit
Route::get('partits', [PartitController::class, 'index'])->name('api.partits.index');
Route::get('partits/{partit}', [PartitController::class, 'show'])->name('api.partits.show');
