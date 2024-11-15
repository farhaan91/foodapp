<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get the logged-in user
        $user = Auth::user();
        
        // Check if the user is authenticated and has the 'admin' role, and optionally a specific ID
        if (Auth::check() && $user->role === 'admin' && $user->id === 2) { // Replace '1' with the specific admin ID if needed
            return $next($request); // Allow access to admin routes
        }

        // Redirect non-admin users to the home page
        return redirect()->route('home')->with('error', 'Access denied.');
    }
}
