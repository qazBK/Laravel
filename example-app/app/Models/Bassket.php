<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bassket extends Model
{
  
    use HasFactory;


public function items()
{
    return $this->hasMany(Item::class);
}
}
