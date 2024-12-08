<?php

namespace App\Http\Middleware;

use App\Models\vendor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $vendor = vendor::where('user_id', Auth::id())->first();
        if (Auth::check() && $vendor) {
            return $next($request);
        }

        return redirect()->back();
    }
}
