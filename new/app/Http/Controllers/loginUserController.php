<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\User; // Don't forget to import the User model
use Illuminate\Http\Request;

class loginUserController extends Controller
{
    public function index()
    {
        // Get the total count of vehicles
        $totalVehicles = Vehicle::count();

        // Get the total count of users
        $totalUsers = User::count();

        return view('backend.loginuser.dashboard', compact('totalVehicles', 'totalUsers'));
    }
}
