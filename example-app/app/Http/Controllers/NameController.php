<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    public function calc(string $x,string $y) {
        return "Результат:".$x+$y;
    }
}
