<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\color;

class Car extends Model 
{
    use HasFactory;

    
    public function color()
    {
        return $this->belongsTo(\App\Models\Color::class, 'color_id');
    } 
       
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    } 
}
