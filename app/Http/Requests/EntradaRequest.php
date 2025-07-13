<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntradaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Permite que cualquier usuario realice esta solicitud
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|min:5|max:50',
            'tag' => 'required|string|min:3|max:20',
            'contenido' => 'required|string|min:5|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El título es obligatorio',
            'titulo.string' => 'El título debe ser una cadena de texto',
            'titulo.max' => 'El título no puede exceder los 50 caracteres',
            'titulo.min' => 'El título debe tener al menos 5 caracteres',

            'tag.required' => 'El tag es obligatorio',
            'tag.string' => 'El tag debe ser una cadena de texto',
            'tag.max' => 'El tag no puede exceder los 20 caracteres',
            'tag.min' => 'El tag debe tener al menos 3 caracteres',

            'contenido.required' => 'El contenido es obligatorio',
            'contenido.string' => 'El contenido debe ser una cadena de texto',
            'contenido.max' => 'El contenido no puede exceder los 255 caracteres',
            'contenido.min' => 'El contenido debe tener al menos 5 caracteres',
        ];
    }
}
