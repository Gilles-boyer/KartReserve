<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationFormuleResource extends JsonResource
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
            'reservation_id' => $this->reservation_id,
            'formule_id' => $this->formule_id,
            'Nombre_de_personnes' => $this->Nombre_de_personnes,
            'Type_de_session' => $this->Type_de_session,
        ];
    }
}
