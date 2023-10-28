<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "session_reservation_id" => $this->pivot->id,
            "heure_debut" => $this->heure_debut,
            "statut" => $this->pivot->Statut,
        ];
    }
}
