<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Groover;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WalletController extends Controller
{
    public function profil(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $user = Auth::user();
        $groover = Groover::where('Id_user', $user->Id_user)->first();
        return view('profil.profil', compact('user', 'groover'));
    }

    public function redirectToProfil(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('profil.profil-redirect');
    }
    public function cloturer(): \Illuminate\Http\JsonResponse
    {
        $user = Auth::user();
        $user = User::where('Id_user', $user->Id_user)->update(['active' => 0]);
        Auth::logout();
        return response()->json(['message' => 'Compte désactivé'], 200);
    }
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        $field = $request->input('field');
        $newValue = $request->input('new_value');

        if ($field === 'email') {
            $user = User::where('Id_user', $user->Id_user)->update(['email' => $newValue]);
        } elseif ($field === 'city') {
            $user = User::where('Id_user', $user->Id_user)->update(['city' => $newValue]);
        }

        return redirect()->route('profil.profil')->with('success', 'Information mise à jour avec succès');
    }

    public function addAvatar(ImageRequest $ImageRequest): \Illuminate\Http\RedirectResponse
    {
        // Récupération de l'utilisateur authentifié
        $user = Auth::user();

        // Gestion du fichier téléchargé
        if ($ImageRequest->hasFile('avatar')) {
            $file = $ImageRequest->file('avatar');
            $filename = 'avatarUser_' . $user->Id_user . '.' . $file->getClientOriginalExtension();

            // Chemin du répertoire de stockage
            $directory = storage_path('app/public/avatars');

            // Créer le répertoire s'il n'existe pas
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            // Déplacer le fichier dans le répertoire storage/app/public/avatars
            $file->move($directory, $filename);
        }

        return redirect()->back();
    }

    public function useGroovies(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('wallet.useGroovies');
    }
}
