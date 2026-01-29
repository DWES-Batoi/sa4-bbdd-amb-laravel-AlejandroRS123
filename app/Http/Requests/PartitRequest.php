<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'local_id' => ['required', 'exists:equips,id'],
            'visitant_id' => ['required', 'exists:equips,id'],
            'estadi_id' => ['required', 'exists:estadis,id'],
            'data' => ['required', 'date'],
            'jornada' => ['required', 'integer', 'min:1'],
            'gols' => ['nullable', 'string', 'regex:/^\d+-\d+$/'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'local_id.required' => 'L\'equip local és obligatori',
            'local_id.exists' => 'L\'equip local no existeix',
            'visitant_id.required' => 'L\'equip visitant és obligatori',
            'visitant_id.exists' => 'L\'equip visitant no existeix',
            'estadi_id.required' => 'L\'estadi és obligatori',
            'estadi_id.exists' => 'L\'estadi no existeix',
            'data.required' => 'La data és obligatòria',
            'data.date' => 'La data ha de ser una data vàlida',
            'jornada.required' => 'La jornada és obligatòria',
            'jornada.integer' => 'La jornada ha de ser un número enter',
            'jornada.min' => 'La jornada ha de ser com a mínim 1',
            'gols.regex' => 'Els gols han de tenir format "X-Y" (ex: 2-1)',
        ];
    }
}
