<?php

// app/Http/Middleware/IsGroover.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsGroover
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->role == 'admin') {
            return $next($request);
        }
        return redirect('/'); // Rediriger si l'utilisateur n'est pas un utilisateur lambda
    }
}
