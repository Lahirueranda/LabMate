<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;
    protected $fillable = ['lab_id', 'start_time', 'end_time','name', 'capacity', 'is_available'];


    public function bookings()
{
    return $this->hasMany(Booking::class);
}

public function users()
{
    return $this->hasMany(User::class);
}


}
