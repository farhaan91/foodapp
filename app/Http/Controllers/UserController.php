<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Profile method for authenticated users
    public function profile()
    {
        return view('profile'); // Make sure to create a 'profile' view
    }


    public function showProfile()
    {
       
        return view('user.profile');
    }
}
