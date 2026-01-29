<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JugadorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'equip_id' => ['required', 'exists:equips,id'],
            'dorsal' => ['nullable', 'integer', 'min:1', 'max:99'], // dorsal suele ser 1-99
            'data_naixement' => ['nullable', 'date', 'before_or_equal:today', 'after:1900-01-01'],
            'foto' => ['nullable', 'url'], // si guardas la URL de la imagen
        ];
    }
}
