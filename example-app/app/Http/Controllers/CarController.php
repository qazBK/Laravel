<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;

class CarController extends Controller
{
    public function index()
    {

        $list = Car::all();
        //$list = Car::with('color')->get();
        $list_color = Color::all();

        return view("cars", ["cars" => $list,
        "list_color" => $list_color,
    ]);
    }

    public function insert()
    {
        if (request()->has('nambo')) {

            $newCar = new car();

            $newCar->brand = request()->input('brand');
            $newCar->color = request()->input('color');
            $newCar->nambo = request()->input('nambo');

            $newCar->save();
        }

        return redirect()->route('car');
    }

   
}
