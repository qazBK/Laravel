<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataTelegramBot extends Model
{
    //
    protected $casts=[
        'data'=>'json',
    ];
}
