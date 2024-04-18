<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\User; // Don't forget to import the User model
use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        // Get the total count of vehicles
        $totalVehicles = Vehicle::count();

        // Get the total count of users
        $totalUsers = User::count();

        // Get the total count of bookings for today
        $todayBookingsCount = Booking::whereDate('created_at', Carbon::today())->count();

        return view('backend.dashboard', compact('totalVehicles', 'totalUsers', 'todayBookingsCount'));
    }
    public function todayBookings()
    {
        // Get today's bookings
        $todayBookings = Booking::whereDate('created_at', Carbon::today())->get();

        return view('backend.booking.today', compact('todayBookings'));
    }

}
