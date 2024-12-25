<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreetController extends Controller
{
    public function index()
    {
        $list = \App\Models\Street::all();
        return view("StreetIndex", ["list" => $list]);   
    }

    public function detail($id)
    {

        $list = \App\Models\Street::where('id',$id)->get();
        return view("BasketDetail", ["list" => $list]);        
    }
}
