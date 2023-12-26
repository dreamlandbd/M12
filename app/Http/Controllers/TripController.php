<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Models\Location;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }
    public function create()
    {
        $options = Location::all();
        return view('trips.create', compact('options'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'departure_loc' => 'required',
            'return_loc' => 'required',
            'date_of_departure' => 'required',
            'date_of_return' => 'required',
        ]);

        Trip::create([
            'description' => $request->input('name'),
            'depature_loc_id' => $request->input('departure_loc'),
            'return_loc_id' => $request->input('return_loc'),
            'departure_date' => $request->input('date_of_departure'),
            'return_date' => $request->input('date_of_return'),
            'price' => $request->input('price'),
            'departure_time' => $request->input('departure_time'),
            'return_time' => $request->input('return_time'),
        ]);

        return redirect()->route('trips.index')->with('success', 'Trips created successfully');
    }
}
