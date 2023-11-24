<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Message extends Model
{
    use HasFactory;

    protected $fillable = ['lab_id', 'content'];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
