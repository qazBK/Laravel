<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    public function City()
    {
        return $this->belongsTo(\App\Models\City::class, 'City_id');
    }
}
