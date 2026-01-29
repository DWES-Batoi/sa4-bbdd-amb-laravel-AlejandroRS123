<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJugadorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // permitir a todos los usuarios autenticados
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'equip_id' => 'required|exists:equips,id',
            'data_naixement' => 'required|date',
            'dorsal' => 'required|integer|min:1|max:99',
            'foto' => 'nullable|image|max:2048',
        ];
    }
}
