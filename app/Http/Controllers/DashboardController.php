<?php

namespace App\Http\Controllers;

use App\Models\User;  
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // This method will be responsible for displaying users in the dashboard
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();  // You can modify this to apply filters or pagination later.

        // Return the view with the users data
        return view('dash', compact('users'));
    }
}
