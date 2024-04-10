<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle; // Import the Vehicle model
use App\Models\VehicleLocation;
use App\Models\VehicleType;

class UserHomeController extends Controller
{
    public function index()
    {
        // Retrieve vehicle data
        $vehicles = Vehicle::all(); // Assuming you want to retrieve all vehicles
        $vehicleLocations = VehicleLocation::all(); // Retrieve all vehicle locations from the database
        $vehicleTypes = VehicleType::all(); // Retrieve all vehicle types from the database

        // Pass vehicle data to the view
        return view('frontend.home', compact('vehicles', 'vehicleLocations', 'vehicleTypes'));
    }

}
