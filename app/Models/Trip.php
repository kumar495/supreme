<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'highlights', 'actual_price', 'discount_price', 'trip_day', 'level', 'destination_id', 'activity_id','description','arrive','departure','image','overview','brief_itinerary','details_itinerary ','trip_includes','trip_excludes'];


    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
