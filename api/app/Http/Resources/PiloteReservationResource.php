<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Models\Alerte;
use Illuminate\Http\Resources\Json\JsonResource;

class PiloteReservationResource extends JsonResource
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
            "client" => new ClientResource($this->client),
            "Date" => $this->Date,
            "nombre_personne" => $this->nombre_personne,
            "Statut" => $this->Statut,
            "Commentaire" => $this->Commentaire,
            "alertes" => AlerteReservationResource::collection($this->alertes),
            "paiements" => PaiementResource::collection($this->paiements),
        ];
    }
}
