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
            'formule' => new FormuleResource($this->formule),
            'sessions' => SessionReservationResource::collection($this->sessions),
            'pilote' => $this->pilote,
            'payed' => $this->payed,
            'Type_de_session' => $this->Type_de_session,
        ];
    }
}
