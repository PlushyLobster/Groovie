<?php

namespace App\Http\Controllers;

use App\Http\Requests\{AuthRequest, ResetPasswordRequest, SendResetLinkEmailRequest, VerifyResetCodeRequest};
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\{Auth, DB, Password, Hash};
use Illuminate\Support\Facades\Log;
use App\Models\{User, Groover};
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function register(AuthRequest $authRequest): RedirectResponse
    {
        // Valider les données du formulaire
        $validated = $authRequest->validated();

        // Créer un nouvel utilisateur et assigner les données validées
        $newUser = User::create([
            'active' => 1,
            'email' => $validated['signin-email'],
            'password' => Hash::make($validated['signin-password']), // Hacher le mot de passe
            'role' => 'groover',
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

        // Authentifier l'utilisateur nouvellement créé en utilisant le guard approprié
        Auth::guard('web')->login($newUser);

        // Rediriger vers une page de succès ou de connexion
        return redirect()->route('home');
    }

    public function login(AuthRequest $authRequest): RedirectResponse
    {
        // Valider les données du formulaire
        $validated = $authRequest->validated();

        // Authentifier l'utilisateur avec l'email et le mot de passe en utilisant le guard approprié
        if (Auth::guard('web')->attempt(['email' => $validated['login-email'], 'password' => $validated['login-password']])) {
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

    public function sendResetLinkEmail(SendResetLinkEmailRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        $token = Password::createToken($user);
        $user->notify(new ResetPasswordNotification($token));

        return response()->json(['status' => 'success', 'message' => 'Lien de réinitialisation envoyé.']);
    }

    public function verifyResetCode(VerifyResetCodeRequest $request): \Illuminate\Http\JsonResponse
    {
        $reset = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->code)
            ->first();

        if ($reset) {
            return response()->json(['message' => 'Code vérifié avec succès.'], 200);
        } else {
            return response()->json(['message' => 'Code invalide ou expiré.'], 400);
        }
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        try {
            $reset = DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->where('token', $request->code)
                ->first();

            if (!$reset) {
                return response()->json(['message' => 'Code invalide'], 400); // Code d'erreur 400 pour une mauvaise requête
            }

            // Mise à jour du mot de passe
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json(['message' => 'Utilisateur introuvable'], 404); // Code d'erreur 404 si l'utilisateur n'existe pas
            }

            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json(['message' => 'Mot de passe réinitialisé avec succès.'], 200); // Code 200 pour un succès
        } catch (\Exception $e) {
            Log::error('Erreur lors de la réinitialisation du mot de passe: ' . $e->getMessage());
            return response()->json(['message' => 'Erreur interne du serveur.'], 500); // Code d'erreur 500 en cas d'exception
        }
    }

    public function profil() {
        $user = User::find(Auth::user()->Id_user);
        $user->load('groovers');
        $data = [
            'profil' => $user,
        ];
        return view('profil.profil', $data);
    }
}
