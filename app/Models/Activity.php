<?php

namespace App\Models;
use App\Models\Destination;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['destination_id','name', 'description'];

    public function destination()
{
    return $this->belongsTo(Destination::class);
}

public function trips()
{
    return $this->hasMany(Trip::class);
}

public function getActivityByDestination($destinationId)
{
    return $this->where('destination_id', $destinationId)->get();
}

}
