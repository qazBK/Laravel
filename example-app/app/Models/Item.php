<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    use HasFactory;


public function Bassket()
{
    return $this->belongsTo(\App\Models\Bassket::class, 'Bassket_id');
}
}