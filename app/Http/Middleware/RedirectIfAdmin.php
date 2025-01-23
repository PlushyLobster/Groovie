<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard'); // Rediriger si l'utilisateur est déjà admin
        }
        return $next($request);
    }
}
