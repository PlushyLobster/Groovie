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
        if ($this->isMethod('post') && $this->routeIs('register')) {
            return [
                'dropdown-name' => 'required',
                'dropdown-firstname' => 'required',
                'dropdown-city' => 'required',
                'dropdown-email' => 'required|email|unique:GRV1_Users,email',
                'dropdown-username' => 'required|unique:GRV1_Users,username',
                'dropdown-password' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&;#^()\-_=+[\]{}|\\:,.<>?])[A-Za-z\d@$!%*?&;#^()\-_=+[\]{}|\\:,.<>?]{6,}$/'
                ],
            ];
        } elseif ($this->isMethod('post') && $this->routeIs('login')) {
            return [
                'dropdown-identifier' => 'required',
                'dropdown-password' => 'required',
            ];
        }

        return [];
    }

    public function messages(): array
    {
        return [
            'dropdown-name.required' => 'Le nom est requis',
            'dropdown-firstname.required' => 'Le prénom est requis',
            'dropdown-email.required' => 'L\'email est requis',
            'dropdown-email.email' => 'L\'email doit être une adresse email valide',
            'dropdown-email.unique' => 'Cet email est déjà utilisé',
            'dropdown-city.required' => 'La ville est requise',
            'dropdown-username.required' => 'Le nom d\'utilisateur est requis',
            'dropdown-username.unique' => 'Ce nom d\'utilisateur est déjà utilisé',
            'dropdown-password.required' => 'Le mot de passe est requis',
            'dropdown-password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'dropdown-password.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial',
            'dropdown-identifier.required' => 'L\'identifiant ou l\'email est requis',
        ];
    }
}
