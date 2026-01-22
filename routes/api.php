<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JugadorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('jugadors', JugadorController::class)
    ->parameters(['jugadors' => 'jugador'])
    ->names([
        'index'   => 'api.jugadors.index',
        'store'   => 'api.jugadors.store',
        'show'    => 'api.jugadors.show',
        'update'  => 'api.jugadors.update',
        'destroy' => 'api.jugadors.destroy',
    ]);
