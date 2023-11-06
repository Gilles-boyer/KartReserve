<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PiloteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     *
     */
    public function toArray(Request $request): array
    {
        return [
            "reservation_formule_id" => $this->id,
            "pilote" => $this->pilote,
            "Type_de_session" => $this->Type_de_session,
            "payed" => $this->payed,
            "sessions_reservation_id" => $this->pivot->id,
            "Statut" => $this->pivot->Statut,
            "formule" => new FormuleResource($this->formule),
            "reservation" => new PiloteReservationResource($this->reservation)
        ];
    }
}
