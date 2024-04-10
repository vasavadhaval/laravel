<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show(Vehicle $vehicle)
    {
        // Load any necessary data related to the vehicle
        // For example: $vehicle->load('category');

        // Pass the vehicle data to the view
        return view('frontend.checkout.show', compact('vehicle'));
    }
}
