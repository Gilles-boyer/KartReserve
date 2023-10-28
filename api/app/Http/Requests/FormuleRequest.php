<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormuleRequest extends FormRequest
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
            'url_image' => 'required|url',
            'Description' => 'required|string',
            'Prix' => 'required|numeric|min:0',
            'nombre_de_session' => 'required|integer|min:1',
        ];
    }
}
