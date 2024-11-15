<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();  // Log out the user

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/');  // Redirect to home after logout
    }
    protected function authenticated(Request $request, $user)
    {
        // Check if the user is an admin
        if ($user->role === 'admin' && $user->id === 1) {
            return redirect()->route('admin.dashboard');
        }
    
        // Default redirection for regular users
        return redirect()->route('home');
    }
    
    protected function redirectTo()
    {
        if (auth()->user() && auth()->user()->role === 'admin') {
            return '/admin/dashboard';
        }

        return '/home';
    }
}
