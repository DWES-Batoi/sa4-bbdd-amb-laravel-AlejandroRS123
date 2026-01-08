<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\EquipController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\PartitController;

Route::get('/', function () {
    return redirect()->route('estadis.index');
});

Route::resource('/estadis', EstadiController::class);
Route::resource('/equips', EquipController::class);
Route::resource('/jugadors', JugadorController::class);
Route::resource('/partits', PartitController::class);
