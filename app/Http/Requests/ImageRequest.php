<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'avatar.required' => 'Veuillez sélectionner une image',
            'avatar.image' => 'Le fichier doit être une image',
            'avatar.mimes' => 'Le fichier doit être une image de type : jpeg, png, jpg, gif',
            'avatar.max' => 'Le fichier ne doit pas dépasser 2 Mo',
        ];
    }
}
