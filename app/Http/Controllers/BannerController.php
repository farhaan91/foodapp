<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner; // Import the Banner model
use Illuminate\Support\Facades\Storage; // For file storage handling

class BannerController extends Controller
{
    // Display all banners (for listing on dashboard)
    public function index()
    {
        $banners = Banner::all(); // Fetch all banners from the database
        return view('dash', compact('banners')); // Pass data to the blade view
    }

    // Store a new banner
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle image uploads
        $image1Path = $request->file('image_1')->store('banners', 'public'); // Store image 1 in 'public/banners'
        $image2Path = $request->file('image_2')->store('banners', 'public'); // Store image 2 in 'public/banners'

        // Create a new banner in the database
        Banner::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_1' => $image1Path, // Store the first image path
            'image_2' => $image2Path, // Store the second image path
            'status' => $request->input('status'), // Store the banner's status
        ]);

        // Redirect back with success message
        return redirect()->route('banner.index')->with('success', 'Banner created successfully!');
    }

    // Edit a specific banner
    public function edit($id)
    {
        $banner = Banner::findOrFail($id); // Fetch the banner by ID
        return response()->json($banner); // Return banner data as JSON for the modal
    }

    // Update an existing banner
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        // Validate the incoming data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional during update
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional during update
            'status' => 'required|in:active,inactive',
        ]);

        // Handle image upload if new images are provided
        if ($request->hasFile('image_1')) {
            // Delete the old image if it exists
            if ($banner->image_1) {
                Storage::delete('public/' . $banner->image_1);
            }

            // Store the new image
            $image1Path = $request->file('image_1')->store('banners', 'public');
            $banner->image_1 = $image1Path; // Update the image 1 path
        }

        if ($request->hasFile('image_2')) {
            // Delete the old image if it exists
            if ($banner->image_2) {
                Storage::delete('public/' . $banner->image_2);
            }

            // Store the new image
            $image2Path = $request->file('image_2')->store('banners', 'public');
            $banner->image_2 = $image2Path; // Update the image 2 path
        }

        // Update the banner title, description, and status
        $banner->title = $request->input('title');
        $banner->description = $request->input('description');
        $banner->status = $request->input('status');
        $banner->save(); // Save the changes

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully!');
    }

    // Delete a banner
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        // Delete the image files from storage if they exist
        if ($banner->image_1) {
            Storage::delete('public/' . $banner->image_1);
        }

        if ($banner->image_2) {
            Storage::delete('public/' . $banner->image_2);
        }

        $banner->delete(); // Delete the banner from the database

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully!');
    }
}
