<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaiementRequest extends FormRequest
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
            'reservation_id' => 'required|exists:reservations,id',
            'Montant' => 'required|numeric|min:0',
            'mode_paiement_id' => 'required|exists:mode_paiements,id',
            'Statut' => 'required|in:Payé,En attente',
        ];
    }
}
