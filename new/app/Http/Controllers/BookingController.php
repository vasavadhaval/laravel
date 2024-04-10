<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all(); // Fetch all bookings
        return view('backend.booking.index', compact('bookings'));
    }
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id); // Find booking by ID
        return view('backend.booking.show', compact('booking'));
    }
    public function userindex()
    {
        // Retrieve bookings associated with the authenticated user
        $bookings = Auth::user()->bookings()->get();

        return view('backend.booking.index', compact('bookings'));
    }
    public function userdestroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }

    public function usershow($id)
    {
        $booking = Booking::findOrFail($id); // Find booking by ID
        return view('backend.booking.show', compact('booking'));
    }
    // Other methods like edit, update, delete, etc., as needed
}
