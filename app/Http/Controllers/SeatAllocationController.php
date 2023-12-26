<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Models\Location;
use Auth;

class SeatAllocationController extends Controller
{
    public function index()
    {
        return view('seat-allocation.index');
    }
    public function create()
    {
        $options = Location::all();
        return view('seat-allocation.create', compact('options'));
    }
    public function search(Request $request)
    {
        $request->validate([
            'departure_loc' => 'required',
            'return_loc' => 'required',
            'date_of_departure' => 'required',
            'date_of_return' => 'required',
        ]);
        $trips = Trip::whereDate('departure_date', $request->input('date_of_departure'))->get();
        return view('seat-allocation.search', compact('trips'));
    }
    public function store(Request $request)
    {
        $options = Location::all();
        $userId = Auth::id();
        $trip = Trip::find($request->input('id'))->first();
        $trip->available_seats -= 1;
        $trip->save();

        SeatAllocation::create([
            'user_id' => $userId,
            'trip_id' => $request->input('id'),
            'seat_number' => $request->input('seat-number'),
        ]);
        return redirect()->route('seat-allocations.create')->
            with('success', 'Seat Booked successfully');
    }
}
