<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['lab_id', 'start_time', 'end_time','user_id', 'status'];

     public function lab()
    {
        return $this->belongsTo(Lab::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
