<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\PartitRequest;
use App\Http\Resources\PartitResource;
use App\Models\Partit;
use Illuminate\Http\Request;

class PartitController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PartitResource::collection(
            Partit::with(['local', 'visitant', 'estadi'])->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'local_id' => ['required', 'exists:equips,id'],
            'visitant_id' => ['required', 'exists:equips,id'],
            'estadi_id' => ['required', 'exists:estadis,id'],
            'data' => ['required', 'date'],
            'jornada' => ['required', 'integer', 'min:1'],
            'gols' => ['nullable', 'string', 'regex:/^\d+-\d+$/'],
        ]);

        $partit = Partit::create($data);

        return $this->sendResponse(
            new PartitResource($partit->load(['local', 'visitant', 'estadi'])),
            'Partit creat correctament',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Partit $partit)
    {
        $partit->load(['local', 'visitant', 'estadi']);
        
        return $this->sendResponse(
            new PartitResource($partit),
            'Partit recuperat correctament'
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartitRequest $request, Partit $partit)
    {
        $partit->update($request->validated());

        return $this->sendResponse(
            new PartitResource($partit->load(['local', 'visitant', 'estadi'])),
            'Partit actualitzat correctament'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partit $partit)
    {
        $partit->delete();

        return $this->sendResponse(
            null,
            'Partit esborrat correctament'
        );
    }
}