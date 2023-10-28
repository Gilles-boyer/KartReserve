<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormuleResource extends JsonResource
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
            'Nom' => $this->Nom,
            'url_image' => $this->url_image,
            'Description' => $this->Description,
            'Prix' => $this->Prix,
            'nombre_de_session' => $this->nombre_de_session,
        ];
    }
}
