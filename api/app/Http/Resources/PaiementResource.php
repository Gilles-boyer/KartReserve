<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaiementResource extends JsonResource
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
            'Montant' => $this->Montant,
            'mode_paiement' => new ModePaiementResource($this->modePaiement),
            'Statut' => $this->Statut,
        ];
    }
}
