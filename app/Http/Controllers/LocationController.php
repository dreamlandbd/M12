<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }
    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        Location::create([
            'name' => $request->input('name'),
            // Add other fields as needed
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('locations.index')->with('success', 'Location created successfully');
    }
}
