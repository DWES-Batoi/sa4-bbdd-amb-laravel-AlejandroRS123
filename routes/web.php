<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartitController;
use Illuminate\Support\Facades\Session;

// Página de bienvenida
Route::get('/', fn() => view('welcome'));

// Dashboard protegido
Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Cambio de idioma
Route::get('/locale/{locale}', function (string $locale) {
    $available = ['ca', 'es', 'en'];

    if (!in_array($locale, $available, true)) {
        $locale = config('app.fallback_locale', 'en');
    }

    Session::put('locale', $locale);

    return redirect()->back();
})->name('setLocale');

// =====================
// 🔹 Rutas públicas SIN parámetros
// =====================

Route::get('equips', [EquipController::class, 'index'])->name('equips.index');
Route::get('estadis', [EstadiController::class, 'index'])->name('estadis.index');
Route::get('jugadors', [JugadorController::class, 'index'])->name('jugadors.index');
Route::get('partits', [PartitController::class, 'index'])->name('partits.index');


// =====================
// 🔒 Rutas protegidas (auth)
// =====================
Route::middleware('auth')->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Equips
    Route::get('equips/create', [EquipController::class, 'create'])->name('equips.create');
    Route::post('equips', [EquipController::class, 'store'])->name('equips.store');
    Route::get('equips/{equip}/edit', [EquipController::class, 'edit'])->name('equips.edit');
    Route::put('equips/{equip}', [EquipController::class, 'update'])->name('equips.update');
    Route::delete('equips/{equip}', [EquipController::class, 'destroy'])->name('equips.destroy');

    // Estadis
    Route::get('estadis/create', [EstadiController::class, 'create'])->name('estadis.create');
    Route::post('estadis', [EstadiController::class, 'store'])->name('estadis.store');
    Route::get('estadis/{estadi}/edit', [EstadiController::class, 'edit'])->name('estadis.edit');
    Route::put('estadis/{estadi}', [EstadiController::class, 'update'])->name('estadis.update');
    Route::delete('estadis/{estadi}', [EstadiController::class, 'destroy'])->name('estadis.destroy');

    // Jugadors
    Route::get('jugadors/create', [JugadorController::class, 'create'])->name('jugadors.create');
    Route::post('jugadors', [JugadorController::class, 'store'])->name('jugadors.store');
    Route::get('jugadors/{jugador}/edit', [JugadorController::class, 'edit'])->name('jugadors.edit');
    Route::put('jugadors/{jugador}', [JugadorController::class, 'update'])->name('jugadors.update');
    Route::delete('jugadors/{jugador}', [JugadorController::class, 'destroy'])->name('jugadors.destroy');

    // Partits
    Route::get('partits/create', [PartitController::class, 'create'])->name('partits.create');
    Route::post('partits', [PartitController::class, 'store'])->name('partits.store');
    Route::get('partits/{partit}/edit', [PartitController::class, 'edit'])->name('partits.edit');
    Route::put('partits/{partit}', [PartitController::class, 'update'])->name('partits.update');
    Route::delete('partits/{partit}', [PartitController::class, 'destroy'])->name('partits.destroy');
});

// =====================
// 🔹 Rutas públicas CON parámetros (¡AL FINAL!)
// =====================

Route::get('equips/{equip}', [EquipController::class, 'show'])->name('equips.show');
Route::get('estadis/{estadi}', [EstadiController::class, 'show'])->name('estadis.show');
Route::get('jugadors/{jugador}', [JugadorController::class, 'show'])->name('jugadors.show');
Route::get('partits/{partit}', [PartitController::class, 'show'])->name('partits.show');

require __DIR__ . '/auth.php';
