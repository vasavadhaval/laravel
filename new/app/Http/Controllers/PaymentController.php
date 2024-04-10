<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to proceed with the booking.');
        }

        // Validate the form data

        $validatedData = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'pickup_location' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        $paymentStatus = $request->payment_id != '' ? 'paid' : 'pending';

        // Create a new booking instance
        $booking = Booking::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(), // Get the authenticated user's ID
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'is_custom_location' => $request->is_custom_location,
            'pickup_location' =>  $request->pickup_location , // Wrap the pickup location in quotes
            'booking_status' => 'pending', // Set the initial booking status
            'payment_id' => $request->payment_id , // Set the initial booking status
            'total_cost' => $request->total_cost , // Set the initial booking status
            'payment_status' => $paymentStatus, // Set the initial booking status

        ]);


        // Redirect the user to a success page or any other desired destination
        return redirect()->route('user.home')->with('success', 'Your booking has been successfully created.');
    }
}
