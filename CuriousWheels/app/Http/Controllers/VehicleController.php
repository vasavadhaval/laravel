<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\VehicleLocation;

use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('backend.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $vehicleTypes = VehicleType::all();
        $vehicleLocations = VehicleLocation::all(); // Retrieve all vehicle locations from the database
        return view('backend.vehicles.create', compact('vehicleTypes', 'vehicleLocations'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'type' => 'required|string|max:100',
            'capacity' => 'required|integer',
            'availability' => 'required|boolean',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'rental_pricing_model' => 'required|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate uploaded image
            'location' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:50',
            'transmission' => 'nullable|string|max:50',
            'mileage' => 'nullable|integer',
            'plate_number' => 'nullable|string|max:20',
            'insurance_number' => 'nullable|string|max:50',
        ]);

        // Handle image upload if present in the request
        if ($request->hasFile('image_url')) {
            $avatarPath = $request->file('image_url')->store('vehicles_img', 'my_storage');
            $validatedData['image_url'] = url(Storage::disk('my_storage')->url($avatarPath));
        }

        // Create a new vehicle record with the validated data
        $vehicle = Vehicle::create($validatedData);

        // Redirect to a relevant page, for example, the vehicle details page
        return redirect()->route('admin.vehicles.index', $vehicle->id);
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return response()->json(['message' => 'Vehicle deleted successfully']);
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('backend.vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicleTypes = VehicleType::all(); // Assuming you have a model called VehicleType
        $vehicleLocations = VehicleLocation::all(); // Assuming you have a model called VehicleLocation
        return view('backend.vehicles.edit', compact('vehicle', 'vehicleTypes', 'vehicleLocations'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'type' => 'required|string|max:100',
            'capacity' => 'required|integer',
            'availability' => 'required|boolean',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'rental_pricing_model' => 'required|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate uploaded image
            'location' => 'nullable|string|max:255',
            'fuel_type' => 'nullable|string|max:50',
            'transmission' => 'nullable|string|max:50',
            'mileage' => 'nullable|integer',
            'plate_number' => 'nullable|string|max:20',
            'insurance_number' => 'nullable|string|max:50',
        ]);

        // Retrieve the vehicle by its ID
        $vehicle = Vehicle::findOrFail($id);

        // Handle image upload if present in the request

        if ($request->hasFile('image_url')) {
            $avatarPath = $request->file('image_url')->store('vehicles_img', 'my_storage');
            $validatedData['image_url'] = url(Storage::disk('my_storage')->url($avatarPath));
        }
        // Update the vehicle with the new data
        $vehicle->update($validatedData);

        // Redirect to the vehicle index page with a success message
        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle updated successfully.');
    }
}
