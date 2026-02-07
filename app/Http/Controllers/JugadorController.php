<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Equip;
use Illuminate\Support\Facades\Storage;

class JugadorController extends Controller
{
    // GET /jugadors
    public function index()
    {
        $jugadors = Jugador::with('equip')->get();
        return view('jugadors.index', compact('jugadors'));
    }

    // GET /jugadors/create
    public function create()
    {
        $equips = Equip::all();
        return view('jugadors.create', compact('equips'));
    }

    // POST /jugadors
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'equip_id' => 'required|exists:equips,id',
            'dorsal' => 'required|integer',
            'data_naixement' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Subir foto si existe
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('jugadors', 'public');
        }

        Jugador::create($validated);

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
    public function update(Request $request, Jugador $jugador)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'equip_id' => 'required|exists:equips,id',
            'dorsal' => 'required|integer',
            'data_naixement' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Subir nueva foto si existe
        if ($request->hasFile('foto')) {
            // Eliminar foto anterior si existe
            if ($jugador->foto) {
                Storage::disk('public')->delete($jugador->foto);
            }
            
            $validated['foto'] = $request->file('foto')->store('jugadors', 'public');
        }

        $jugador->update($validated);

        return redirect()->route('jugadors.index')
            ->with('success', 'Jugador actualitzat correctament!');
    }

    // DELETE /jugadors/{jugador}
    public function destroy(Jugador $jugador)
    {
        // Eliminar foto si existe
        if ($jugador->foto) {
            Storage::disk('public')->delete($jugador->foto);
        }

        $jugador->delete();

        return redirect()->route('jugadors.index')
            ->with('success', 'Jugador esborrat correctament!');
    }
}