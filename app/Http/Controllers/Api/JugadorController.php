<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController; // ← Usa tu clase base
use App\Http\Requests\JugadorRequest;
use App\Http\Resources\JugadorResource;
use App\Models\Jugador;
use Illuminate\Http\Request; // ← AÑADE ESTA LÍNEA IMPORTANTE

class JugadorController extends ApiController // ← Cambia Controller por BaseController
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

    public function store(Request $request) // ✅ Ahora Request funciona
    {
        $data = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'equip_id' => ['required', 'exists:equips,id'],
            'dorsal' => ['nullable', 'integer', 'min:1', 'max:99'],
            'data_naixement' => ['nullable', 'date', 'before_or_equal:today', 'after:1900-01-01'],
            'foto' => ['nullable', 'url'],
        ]);

        $jugador = Jugador::create($data); // ✅ Sin FQCN, ya está importado

        return $this->sendResponse(
            $jugador->load('equip'),
            'Jugador creat correctament',
            201
        );
    }

    public function update(JugadorRequest $request, Jugador $jugador)
    {
        $jugador->update($request->validated());

        return $this->sendResponse(
            new JugadorResource($jugador),
            'Jugador actualitzat correctament'
        );
    }

    public function destroy(Jugador $jugador)
    {
        $jugador->delete();

        return $this->sendResponse(
            null,
            'Jugador esborrat correctament'
        );
    }
}
