<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JugadorRequest;
use App\Http\Resources\JugadorResource;
use App\Models\Jugador;

class JugadorController extends Controller
{
    public function index()
    {
        return JugadorResource::collection(
            Jugador::query()->paginate(10)
        );
    }

    public function show(Jugador $jugador)
    {
        return new JugadorResource($jugador);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'equip_id' => ['required', 'exists:equips,id'],
            'dorsal' => ['nullable', 'integer', 'min:1', 'max:99'], // dorsal suele ser 1-99
            'data_naixement' => ['nullable', 'date', 'before_or_equal:today', 'after:1900-01-01'],
            'foto' => ['nullable', 'url'],
        ]);

        $jugador = \App\Models\Jugador::create($data);

        return response()->json($jugador->load('equip'), 201);
    }

    public function update(JugadorRequest $request, Jugador $jugador)
    {
        $jugador->update($request->validated());

        return new JugadorResource($jugador);
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        return response()->noContent(); // 204
    }
}
