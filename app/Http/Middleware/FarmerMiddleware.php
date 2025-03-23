<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Ensure the user is authenticated and has the 'farmer' role
        if (Auth::check() && Auth::user()->role === 'farmer') {
            return $next($request);
        }

        // Redirect unauthorized users
        return redirect('/login')->with('error', 'Access denied. Farmers only.');
    }
}
