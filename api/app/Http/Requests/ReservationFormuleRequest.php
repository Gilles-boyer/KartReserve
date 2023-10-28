<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationFormuleRequest extends FormRequest
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
            'formule_id' => 'required|exists:formules,id',
            'Nombre_de_personnes' => 'required|integer|min:1',
            'Type_de_session' => 'required|in:adult,enfant,biplace',
        ];
    }
}
