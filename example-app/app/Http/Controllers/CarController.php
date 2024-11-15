<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\Color;


class CarController extends Controller
{
    public function index()
    {

        //$list = Car::all();
        //$list = Car::with('color')->get();
        $list=Car::where('user_id',auth('web')->user()->id)->get();


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

            if (request()->user('web')->cannot('create', Car::class)){
                abort(403);
            }

            $newCar = new car();

            $newCar->brand = request()->input('brand');
            $newCar->color_id = request()->input('color');
            $newCar->nambo = request()->input('nambo');
            $newCar->user_id = auth('web')->user()->id;

            $newCar->save();
        }

        return redirect()->route('car');
    }

   
}
