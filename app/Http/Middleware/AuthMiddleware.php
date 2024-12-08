<?php

namespace App\Http\Middleware;

use App\Models\vendor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check() && Auth::user()->role === 'admin' || Auth::check()) {
            return $next($request);
        }

        return redirect('/login');
    }
}

