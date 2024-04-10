<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle; // Import the Vehicle model
use App\Models\VehicleType; // Import the Vehicle model

class VehiclesController extends Controller
{
    public function index()
    {
        // Retrieve all vehicles from the database
        $vehicles = Vehicle::all();

        // Pass the retrieved vehicles data to the view
        return view('frontend.vehicles.index', compact('vehicles'));
    }

    public function show($id)
    {
        // Retrieve the specific vehicle based on the provided ID
        $vehicle = Vehicle::findOrFail($id);

        // Retrieve categories for sidebar with count of associated vehicles
        $categories = VehicleType::withCount('vehicles')->get();

        // Pass the retrieved vehicle data and categories to the view
        return view('frontend.vehicles.show', compact('vehicle', 'categories'));
    }
    public function vehicle_types($id)
    {
        // Retrieve the specific vehicle type based on the provided ID
        $vehicleType = VehicleType::findOrFail($id);

        // Retrieve vehicles associated with the vehicle type
        $vehicles = Vehicle::where('type', $id)->get();

        // Pass the retrieved vehicle type and vehicles data to the view
        return view('frontend.vehicles.vehicle_types', compact('vehicleType', 'vehicles'));
    }
/**
     * Display a listing of the search results.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function search(Request $request)
    {
        // Extract search parameters from the request
        $searchQuery = $request->input('query');
        $pickupLocation = $request->input('pickup_location');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $vehicleCategory = $request->input('vehicle_category');

        // Perform the search using the query parameter and additional search parameters
        $vehicles = Vehicle::where(function($query) use ($searchQuery) {
                $query->where('make', 'like', '%' . $searchQuery . '%')
                    ->orWhere('model', 'like', '%' . $searchQuery . '%')
                    ->orWhere('year', 'like', '%' . $searchQuery . '%')
                    ->orWhere('description', 'like', '%' . $searchQuery . '%');
            })
            ->where('location', $pickupLocation)
            ->where('type', $vehicleCategory)
            ->whereDoesntHave('bookings', function ($query) use ($startDate, $endDate) {
                $query->where(function ($subQuery) use ($startDate, $endDate) {
                    $subQuery->whereBetween('start_date', [$startDate, $endDate])
                        ->orWhereBetween('end_date', [$startDate, $endDate]);
                });
            })
            ->get();

        // Return the view with the search results
        return view('frontend.vehicles.search', compact('vehicles', 'searchQuery'));
    }




}
