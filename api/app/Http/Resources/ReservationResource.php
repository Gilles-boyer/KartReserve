<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FormuleReservationResource;

class ReservationResource extends JsonResource
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
            'client' => new ClientResource($this->client),
            'Date' => $this->Date,
            'nombre_personne' => $this->nombre_personne,
            'Statut' => $this->Statut,
            'Commentaire' => $this->Commentaire,
            'reservationFormules' => ReservationFormuleResource::collection($this->reservationFormules),
            'paiements' => PaiementResource::collection($this->paiements),
            'alertes' => AlerteReservationResource::collection($this->alertes)
        ];
    }
}
