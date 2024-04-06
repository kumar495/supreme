<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address','no_of_people', 'date','trip_id','phone'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

}
