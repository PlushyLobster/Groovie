<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    public function register(AuthRequest $authRequest): \Illuminate\Http\RedirectResponse
    {
        // Valider les données du formulaire
        $validated = $authRequest->validated();

        dd($validated);

        // Si la validation échoue, Laravel redirige automatiquement avec les erreurs
        // Ajoutez une variable de session pour indiquer qu'il y a eu une erreur
        return redirect()->back()->withInput()->with('dropdownError', true);
    }
}
