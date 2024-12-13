<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BascetController extends Controller
{
    public function index()
    {
        $list = \App\Models\Bassket::all();
        return view("BasketIndex", ["list" => $list]);    
    }
    public function basket($id)
    {
        
    }
    
    public function detail($id)
    {

        $list = \App\Models\Item::where('Basket_id',$id)->get();
        return view("BasketDetail", ["list" => $list]);        
    }
}
