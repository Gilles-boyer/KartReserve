<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationSessionResource extends JsonResource
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
            "id" => $this->id,
            "heure_debut" => $this->heure_debut,
            "reservations" => PiloteResource::collection($this->reservations->where('reservation.Date', $this->date))
            //"reservation" => $this->reservations->where('reservation.Date', $this->date)
        ];
    }
}
