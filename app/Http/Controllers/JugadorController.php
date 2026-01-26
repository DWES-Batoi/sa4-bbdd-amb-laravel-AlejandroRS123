<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJugadorRequest;
use App\Http\Requests\UpdateJugadorRequest;
use App\Models\Jugador;
use App\Models\Equip;

class JugadorController extends Controller
{
    // GET /jugadors
    public function index()
    {
        // Listar todos los jugadores con su equipo
        $jugadors = Jugador::with('equip')->get();
        return view('jugadors.index', compact('jugadors'));
    }

    // GET /jugadors/create
    public function create()
    {
        // Necesitamos los equipos para asignar un jugador
        $equips = Equip::all();
        return view('jugadors.create', compact('equips'));
    }

    // POST /jugadors
    public function store(StoreJugadorRequest $request)
    {
        Jugador::create($request->validated());

        return redirect()->route('jugadors.index')
            ->with('success', 'Jugador creat correctament!');
    }

    // GET /jugadors/{jugador}
    public function show(Jugador $jugador)
    {
        return view('jugadors.show', compact('jugador'));
    }

    // GET /jugadors/{jugador}/edit
    public function edit(Jugador $jugador)
    {
        $equips = Equip::all();
        return view('jugadors.edit', compact('jugador', 'equips'));
    }

    // PUT/PATCH /jugadors/{jugador}
    public function update(UpdateJugadorRequest $request, Jugador $jugador)
    {
        $jugador->update($request->validated());

        return redirect()->route('jugadors.index')
            ->with('success', 'Jugador actualitzat correctament!');
    }

    // DELETE /jugadors/{jugador}
    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        return redirect()->route('jugadors.index')
            ->with('success', 'Jugador esborrat correctament!');
    }
}
