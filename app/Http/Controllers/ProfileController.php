<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        // Validate and update profile data here
        // Example: $request->validate(['name' => 'required', 'email' => 'required|email']);
        // User::update($request->all());

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }
}
