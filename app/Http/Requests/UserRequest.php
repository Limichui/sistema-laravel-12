<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:8|max:255',
            'email' => 'required|email|unique:users,email,' . $this->route('usuario'), // Assuming 'usuario' is the route name for the user resource
            'password' => 'required|string|min:8|max:255',
            'activo' => 'required|boolean', // Assuming 'activo' is a boolean field
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El nombre debe ser una cadena de texto',
            'name.max' => 'El nombre no puede exceder los 255 caracteres',
            'name.min' => 'El nombre debe tener al menos 8 caracteres',

            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'Debe ingresar un email válido',
            'email.unique' => 'Este email ya está registrado',
            'email.max' => 'El email no puede exceder los 255 caracteres',

            'password.required' => 'El campo password es obligatorio',
            'password.max' => 'El password no puede exceder los 255 caracteres',
            'password.min' => 'El pasword debe tener al menos 8 caracteres',

            'activo.required' => 'El campo activo es obligatorio',
            'activo.boolean' => 'Debe seleccionar un valor válido para estado',
        ];
    }
}
