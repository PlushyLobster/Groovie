<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'dropdown-name' => 'required',
            'dropdown-firstname' => 'required',
            'dropdown-email' => 'required|email',
            'dropdown-city' => 'required',
            'dropdown-password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/' // la règle regex vérifie que le mot de passe contient au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'dropdown-name.required' => 'Le nom est requis',
            'dropdown-firstname.required' => 'Le prénom est requis',
            'dropdown-email.required' => 'L\'email est requis',
            'dropdown-email.email' => 'L\'email doit être une adresse email valide',
            'dropdown-city.required' => 'La ville est requise',
            'dropdown-password.required' => 'Le mot de passe est requis',
            'dropdown-password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'dropdown-password.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial',
        ];

    }
}
