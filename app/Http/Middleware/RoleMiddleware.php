<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        if ($user->role !== $role) {
            return redirect()->route('vendor.dashboard')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}

