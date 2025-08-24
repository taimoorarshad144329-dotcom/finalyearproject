<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id','user_id',
        'pickup_location','pickup_at',
        'return_location','return_at',
        'full_name','email','phone','cnic',
        'address','city','zip_code',
        'driving_license','license_expiry',
        'special_requests','status','total_amount',
    ];

    protected $casts = [
        'pickup_at' => 'datetime',
        'return_at' => 'datetime',
        'license_expiry' => 'date',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
