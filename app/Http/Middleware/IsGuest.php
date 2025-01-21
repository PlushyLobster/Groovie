<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsGuest
{
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            return redirect('/'); // Redirige si l'utilisateur est connecté
        }

        return $next($request);
    }
}
