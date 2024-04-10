<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleLocation;

class VehicleLocationController extends Controller
{
    public function index()
    {
        $vehicleLocations = VehicleLocation::all();
        return view('backend.vehicle_locations.index', compact('vehicleLocations'));
    }

    public function create()
    {
        return view('backend.vehicle_locations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        VehicleLocation::create($validatedData);

        return redirect()->route('admin.vehicle_locations.index')->with('success', 'Vehicle Location created successfully.');
    }

    public function show($id)
    {
        $vehicleLocation = VehicleLocation::findOrFail($id);
        return view('backend.vehicle_locations.show', compact('vehicleLocation'));
    }

    public function edit($id)
    {
        $vehicleLocation = VehicleLocation::findOrFail($id);
        return view('backend.vehicle_locations.edit', compact('vehicleLocation'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        $vehicleLocation = VehicleLocation::findOrFail($id);
        $vehicleLocation->update($validatedData);

        return redirect()->route('admin.vehicle_locations.index')->with('success', 'Vehicle Location updated successfully.');
    }

    public function destroy($id)
    {
        $vehicleLocation = VehicleLocation::findOrFail($id);
        $vehicleLocation->delete();

        return response()->json(['success' => 'Vehicle Location deleted successfully.']);
    }
}
