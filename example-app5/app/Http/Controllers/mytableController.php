<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mytableController extends Controller
{
    public function index()
    {

        //$list = \App\Models\Street::all();
        $list = \App\Models\Mytable::all();

        return view("MytableView", ["list" => $list]);
    }
}
