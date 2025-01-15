<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'dropdown-name' => 'required',
            'dropdown-email' => 'required|email',
            'dropdown-city' => 'required',
            'dropdown-password' => 'required|min:6',
        ]);

        // Si la validation échoue, Laravel redirige automatiquement avec les erreurs
        // Ajoutez une variable de session pour indiquer qu'il y a eu une erreur
        return redirect()->back()->withInput()->with('dropdownError', true);
    }
}
