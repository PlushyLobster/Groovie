<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Groover};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRequest $authRequest): RedirectResponse
    {
        // Valider les données du formulaire
        $validated = $authRequest->validated();

        // Créer un nouvel utilisateur et assigner les données validées
        $newUser = User::create([
            'active' => 1,
            'username' => $validated['dropdown-username'],
            'email' => $validated['dropdown-email'],
            'password' => Hash::make($validated['dropdown-password']), // Hacher le mot de passe
            'cgu_validated' => 1,
        ]);
        // Créer une nouvelle instance de Groover et assigner les données nécessaires
        $newGroover = Groover::create([
            'nb_groovies' => 0,
            'Id_user' => $newUser->Id_user,
            'name' => $validated['dropdown-name'],
            'firstname' => $validated['dropdown-firstname'],
            'city' => $validated['dropdown-city'],
        ]);

        // Authentifier l'utilisateur nouvellement créé
        Auth::login($newUser);

        // Rediriger vers une page de succès ou de connexion
        return redirect()->route('home')->with('success', 'Inscription réussie. Vous êtes connecté.');
    }
    public function login(AuthRequest $authRequest): RedirectResponse
    {
        // Valider les données du formulaire
        $validated = $authRequest->validated();

        // Authentifier l'utilisateur avec l'email ou l'username
        if (Auth::attempt(['email' => $validated['dropdown-identifier'], 'password' => $validated['dropdown-password']]) ||
            Auth::attempt(['username' => $validated['dropdown-identifier'], 'password' => $validated['dropdown-password']])) {
            // Rediriger vers une page de succès ou de connexion
            return redirect()->route('home')->with('success', 'Connexion réussie.');
        }

        // Rediriger vers une page d'erreur ou de connexion
        return redirect()->route('home')->with('error', 'Connexion échouée.');
    }
    public function logout(): RedirectResponse
    {
        // Déconnecter l'utilisateur
        Auth::logout();

        // Rediriger vers une page de succès ou de connexion
        return redirect()->route('home')->with('success', 'Déconnexion réussie.');
    }
}
