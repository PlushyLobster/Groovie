<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WalletController extends Controller
{
    public function profil()
    {
        $user = auth()->user();
        $groover = \DB::table('GRV1_Groovers')->where('Id_user', $user->Id_user)->first();
        $initials = strtoupper(substr($groover->firstname, 0, 1) . substr($groover->name, 0, 1));
        return view('profil.profil', compact('user', 'groover', 'initials'));
    }

    public function header()
    {
        $user = auth()->user();
        $groover = \DB::table('GRV1_Groovers')->where('Id_user', $user->Id_user)->first();
        $initials = strtoupper(substr($groover->firstname, 0, 1) . substr($groover->name, 0, 1));
        return view('Include.header', compact('initials'));
    }

    public function redirectToProfil()
    {
        return redirect()->route('profil.profil');
    }
    public function cloturer()
    {
        $user = Auth::user();
        \DB::table('GRV1_Users')->where('Id_user', $user->Id_user)->update(['active' => 0]);
        Auth::logout();
        return response()->json(['message' => 'Compte désactivé'], 200);
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $field = $request->input('field');
        $newValue = $request->input('new_value');

        if ($field === 'email') {
            \DB::table('GRV1_Users')->where('Id_user', $user->Id_user)->update(['email' => $newValue]);
        } elseif ($field === 'city') {
            \DB::table('GRV1_Groovers')->where('Id_user', $user->Id_user)->update(['city' => $newValue]);
        }

        return redirect()->route('profil.profil')->with('success', 'Information mise à jour avec succès');
    }
}
