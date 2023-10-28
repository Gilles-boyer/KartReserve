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
            'Statut' => $this->Statut,
            'Commentaire' => $this->Commentaire,
            'formules' => FormuleReservationResource::collection($this->formules),
            'sessions' => SessionReservationResource::collection($this->sessions),
            'paiements' => PaiementResource::collection($this->paiements),
            'alertes' => AlerteReservationResource::collection($this->alertes)
        ];
    }
}
