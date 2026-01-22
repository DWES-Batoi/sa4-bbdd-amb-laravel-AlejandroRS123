<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        return Jugador::all(); // o Jugador::get()
    }

    public function show(Jugador $jugador)
    {
        return $jugador;
    }
}
