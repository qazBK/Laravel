<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        $list = \App\Models\Region::all();
       /* return view("BasketIndex", ["list" => $list]);*/    
    }
}
