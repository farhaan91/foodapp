<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required|date_format:H:i',
            'number_of_people' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:1000',
        ]);

        Booking::create([
            'user_id' => auth()->id(),  
            'full_name' => $validated['full_name'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'] ?? null,
            'reservation_date' => $validated['reservation_date'],
            'reservation_time' => $validated['reservation_time'],
            'number_of_people' => $validated['number_of_people'],
            'special_requests' => $validated['special_requests'],
            'status' => 'approved',  
        ]);

        return redirect()->back()->with('success', 'Your reservation has been successfully made!');
    }

    public function index(Request $request)
    {
        // Get the status from the query parameters (if any)
        $status = $request->input('status');
    
        if ($status) {
            // If there's a specific status, filter bookings by status
            $bookings = Booking::where('status', $status)->get();
        } else {
            // Otherwise, fetch all bookings
            $bookings = Booking::all();
        }
        
        return view('dash', compact('bookings'));
    }
    
}