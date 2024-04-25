<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\UserDocument;
use App\Models\User; // Don't forget to import the User model
use Illuminate\Http\Request;
use Carbon\Carbon;

class loginUserController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Get the total count of the logged-in user's documents
        $totalDocuments = UserDocument::where('user_id', $userId)->count();

        // Retrieve the logged-in user's documents (optional: limit the number)
        $documents = UserDocument::where('user_id', $userId)->latest()->limit(5)->get();

        // Today's bookings count for the logged-in user (unchanged)
        $todayBookingsCount = Booking::where('user_id', $userId)
                                      ->whereDate('created_at', Carbon::today())
                                      ->count();

        return view('backend.loginuser.dashboard', compact(
            'totalDocuments',
            'documents',
            'todayBookingsCount'
        ));
    }


}
