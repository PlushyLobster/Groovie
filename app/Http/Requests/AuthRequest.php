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
                'signin-name' => 'required',
                'signin-firstname' => 'required',
                'signin-city' => 'required',
                'signin-email' => 'required|email|unique:GRV1_Users,email',
                'signin-username' => 'required|unique:GRV1_Users,username',
                'signin-password' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&;#^()\-_=+[\]{}|\\:,.<>?])[A-Za-z\d@$!%*?&;#^()\-_=+[\]{}|\\:,.<>?]{6,}$/'
                ],
            ];
        } elseif ($this->isMethod('post') && $this->routeIs('login')) {
            return [
                'login-email' => 'required|email|exists:GRV1_Users,email',
                'login-password' => 'required',
            ];
        }

        return [];
    }

    public function messages(): array
    {
        return [
            'signin-name.required' => 'Le nom est requis',
            'signin-firstname.required' => 'Le prénom est requis',
            'signin-email.required' => 'L\'email est requis',
            'signin-email.email' => 'L\'email doit être une adresse email valide',
            'signin-email.unique' => 'Cet email est déjà utilisé',
            'signin-city.required' => 'La ville est requise',
            'signin-username.required' => 'Le nom d\'utilisateur est requis',
            'signin-username.unique' => 'Ce nom d\'utilisateur est déjà utilisé',
            'signin-password.required' => 'Le mot de passe est requis',
            'signin-password.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'signin-password.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial',
            'login-email.required' => 'L\'email est requis',
            'login-email.exists' => 'Les informations sont incorrectes',
            'login-email.email' => 'Le format de l\'email est invalide',
            'login-password.required' => 'Le mot de passe est requis',
        ];
    }
}
