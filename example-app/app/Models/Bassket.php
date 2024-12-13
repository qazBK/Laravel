<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Bassket extends Model
{
public function items()
{
    return $this->hasMany(Item::class);
}
}
