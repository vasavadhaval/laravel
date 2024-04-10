<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    public function index()
    {
        $vehicleTypes = VehicleType::all();
        return view('backend.vehicle_types.index', compact('vehicleTypes'));
    }

    public function create()
    {
        return view('backend.vehicle_types.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        VehicleType::create($validatedData);

        return redirect()->route('admin.vehicle_types.index')->with('success', 'Vehicle Type created successfully.');
    }

    public function show($id)
    {
        $vehicleType = VehicleType::findOrFail($id);
        return view('backend.vehicle_types.show', compact('vehicleType'));
    }

    public function edit($id)
    {
        $vehicleType = VehicleType::findOrFail($id);
        return view('backend.vehicle_types.edit', compact('vehicleType'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add validation rules for other fields as needed
        ]);

        $vehicleType = VehicleType::findOrFail($id);
        $vehicleType->update($validatedData);

        return redirect()->route('admin.vehicle_types.index')->with('success', 'Vehicle Type updated successfully.');
    }

    // public function destroy($id)
    // {
    //     $vehicleType = VehicleType::findOrFail($id);
    //     $vehicleType->delete();

    //     return redirect()->json('success', 'Vehicle Type deleted successfully.');
    // }
    public function destroy($id)
    {
        // $vehicle = Vehicle::findOrFail($id);
        // $vehicle->delete();
                $vehicleType = VehicleType::findOrFail($id);
        $vehicleType->delete();
        return response()->json(['success' => 'Vehicle Type deleted successfully.']);
    }
}
