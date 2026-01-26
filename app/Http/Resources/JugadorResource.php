<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JugadorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'equip_id' => $this->equip_id,
            'foto' => $this->foto,
            'dorsal' => $this->dorsal,
            'data_naixement' => $this->data_naixement,
        ];
    }
}
