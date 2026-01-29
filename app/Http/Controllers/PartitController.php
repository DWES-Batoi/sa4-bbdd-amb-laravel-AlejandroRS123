<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartitRequest;
use App\Http\Requests\UpdatePartitRequest;
use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;

class PartitController extends Controller
{
    // GET /partits
    public function index()
    {
        $partits = Partit::with(['local', 'visitant', 'estadi'])->get();
        return view('partits.index', compact('partits'));
    }

    // GET /partits/create
    public function create()
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.create', compact('equips', 'estadis'));
    }

    // POST /partits
    public function store(StorePartitRequest $request)
    {
        Partit::create($request->validated());

        return redirect()->route('partits.index')
            ->with('success', 'Partit creat correctament!');
    }

    // GET /partits/{partit}
    public function show(Partit $partit)
    {
        $partit->load(['local', 'visitant', 'estadi']);
        return view('partits.show', compact('partit'));
    }

    // GET /partits/{partit}/edit
    public function edit(Partit $partit)
    {
        $equips = Equip::all();
        $estadis = Estadi::all();
        return view('partits.edit', compact('partit', 'equips', 'estadis'));
    }

    // PUT/PATCH /partits/{partit}
    public function update(UpdatePartitRequest $request, Partit $partit)
    {
        $partit->update($request->validated());

        return redirect()->route('partits.index')
            ->with('success', 'Partit actualitzat correctament!');
    }

    // DELETE /partits/{partit}
    public function destroy(Partit $partit)
    {
        $partit->delete();

        return redirect()->route('partits.index')
            ->with('success', 'Partit esborrat correctament!');
    }
}
