<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    protected $fillable = [
        'make',
        'model',
        'year',
        'type',
        'capacity',
        'availability',
        'description',
        'price',
        'rental_pricing_model',
        'image_url',
        'location',
        'fuel_type',
        'transmission',
        'mileage',
        'plate_number',
        'insurance_number'
    ];
        /**
     * Get the vehicle type for the vehicle.
     */
    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'type');
    }
    public function vehiclelocation()
    {
        return $this->belongsTo(VehicleLocation::class, 'location');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
