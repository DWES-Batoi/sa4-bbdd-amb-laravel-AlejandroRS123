<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PartitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'local_id' => $this->local_id,
            'visitant_id' => $this->visitant_id,
            'estadi_id' => $this->estadi_id,
            'data' => $this->data,
            'jornada' => $this->jornada,
            'gols' => $this->gols,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'local' => [
                'id' => $this->local->id,
                'nom' => $this->local->nom,
            ],
            'visitant' => [
                'id' => $this->visitant->id,
                'nom' => $this->visitant->nom,
            ],
            'estadi' => [
                'id' => $this->estadi->id,
                'nom' => $this->estadi->nom,
            ],
        ];
    }
}
