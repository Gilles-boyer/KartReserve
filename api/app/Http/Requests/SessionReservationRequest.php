<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "reservation_formule_id" => "required|exists:reservation_formules,id",
            "session_id" => "required|exists:sessions,id",
            "Statut" => "required|in:Prévu,En cours,Terminé",
        ];
    }
}
