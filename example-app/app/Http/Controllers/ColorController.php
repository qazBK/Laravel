<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller

{
    public function index()
    {

        $list = Color::all();

        return view("colors", ["color" => $list]);
    }

    public function delete(string $id)
    {

        $validated = request()->validate([
            'id' => 'exists:App\Models\color,id'
        ]);

        Color::find($id)->delete();
        return redirect()->route('color');
    }
    public function insert()
    {
        if (request()->has('title')) {

            $newColor = new Color();

            $newColor->title = request()->input('title');
            
            $newColor->save();
        }

        return redirect()->route('color');
    }
}


