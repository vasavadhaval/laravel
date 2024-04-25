<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\BookingRequestReceived;
use Illuminate\Support\Facades\Mail;
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
            'start_date' => 'required|date_format:d M Y H:i', // Format: DD MMM YYYY HH:mm
            'end_date' => 'required|date_format:d M Y H:i|after:start_date', // Format: DD MMM YYYY HH:mm and must be after start_date
        ]);

        $paymentStatus = $request->payment_id != '' ? 'paid' : 'pending';

        // Create a new booking instance
        $start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        $end_date = date('Y-m-d H:i:s', strtotime($request->end_date));

        // Create a new booking instance
        $booking = Booking::create([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => Auth::id(),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'is_custom_location' => $request->is_custom_location,
            'pickup_location' => $request->pickup_location,
            'booking_status' => 'pending',
            'payment_id' => $request->payment_id,
            'total_cost' => $request->total_cost,
            'payment_status' => $paymentStatus,
        ]);
    // Send email confirmation to the user
    Mail::to(Auth::user()->email)->send(new BookingRequestReceived(Auth::user(), $booking));


        // Redirect the user to a success page or any other desired destination
        return redirect()->route('user.home')->with('success', 'Your booking has been successfully created.');
    }
}
