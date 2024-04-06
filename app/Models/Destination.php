<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function activities()
{
    return $this->hasMany(Activity::class);
}

public function trips()
{
    return $this->hasMany(Trip::class);
}

}
