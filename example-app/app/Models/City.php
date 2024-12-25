<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function Street()
    {
        return $this->hasMany(\App\Models\Street::class);
    }     

    public function Region()
    {
        return $this->belongsTo(\App\Models\Region::class, 'Region_id');
    } 
}
