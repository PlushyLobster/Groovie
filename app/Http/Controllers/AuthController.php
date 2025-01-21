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
            'username' => $validated['signin-username'],
            'email' => $validated['signin-email'],
            'password' => Hash::make($validated['signin-password']), // Hacher le mot de passe
            'cgu_validated' => 1,
        ]);
        // Créer une nouvelle instance de Groover et assigner les données nécessaires
        $newGroover = Groover::create([
            'nb_groovies' => 0,
            'Id_user' => $newUser->Id_user,
            'name' => $validated['signin-name'],
            'firstname' => $validated['signin-firstname'],
            'city' => $validated['signin-city'],
        ]);

        // Authentifier l'utilisateur nouvellement créé
        Auth::login($newUser);

        // Rediriger vers une page de succès ou de connexion
        return redirect()->route('home');
    }
    public function login(AuthRequest $authRequest): RedirectResponse
    {
        // Valider les données du formulaire
        $validated = $authRequest->validated();

        // Authentifier l'utilisateur avec l'email et le mot de passe
        if (Auth::attempt(['email' => $validated['login-email'], 'password' => $validated['login-password']])) {
            // Rediriger vers la page d'accueil en cas de succès
            return redirect()->route('home');
        }

        // Rediriger vers la page de connexion avec un message d'erreur en cas d'échec
        return redirect()->route('home')->withErrors(['login-error' => 'Les informations d\'identification sont incorrectes.']);
    }
    public function logout(): RedirectResponse
    {
        // Déconnecter l'utilisateur
        Auth::logout();

        // Rediriger vers une page de succès ou de connexion
        return redirect()->route('home');
    }
}
