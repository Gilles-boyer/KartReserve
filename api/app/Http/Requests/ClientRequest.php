<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'Nom' => 'required|string|max:255',
            'Tel' => 'required|string|max:255|unique:clients,Tel,'.$this->id,
            'Email' => 'nullable|string|email|max:255|unique:clients,Email,'.$this->id,
            'Commentaire' => 'nullable|string',
        ];
    }
}
