<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['trip_id', 'content','name', 'rating', 'email','address','title','image'];   

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

}
