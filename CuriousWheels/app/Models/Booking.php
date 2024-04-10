<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'vehicle_id',
        'user_id',
        'start_date',
        'end_date',
        'pickup_location',
        'booking_status',
        'total_cost',
        'payment_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

