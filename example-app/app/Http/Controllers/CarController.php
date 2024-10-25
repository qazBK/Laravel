<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\Color;


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
    //https://laravel.su/docs/11.x/validation

    $validated = request()->validate([
        'brand' => 'required|max:255',
        'color' => 'exists:App\Models\color,id',
        'nambo' => 'required|max:255',
    ]);
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
