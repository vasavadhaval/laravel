<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Booking;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public function show(Vehicle $vehicle)
    {
        $bookedDates = Booking::where('vehicle_id', $vehicle->id)
        ->selectRaw('DATE_FORMAT(start_date, "%Y-%m-%d") AS start_date, DATE_FORMAT(end_date, "%Y-%m-%d") AS end_date')
        ->where('end_date', '>=', now())  // Filter for end_date >= current date
        ->get()
        ->toArray();

        $formattedBookedDates = [];
        foreach ($bookedDates as $date) {
            $formattedBookedDates[] = [
                'from' => $date['start_date'],
                'to' => $date['end_date'],
            ];
        }

        return view('frontend.checkout.show', compact('vehicle', 'formattedBookedDates'));
    }
}
