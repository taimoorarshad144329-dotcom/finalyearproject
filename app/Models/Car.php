<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public $timestamps = true;
    
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
