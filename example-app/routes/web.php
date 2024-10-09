<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/test2', function ()  {
    return "123";
});

Route::get('/test3',[\App\Http\Controllers\Testcontroller::class, 'index']) ->name('test3') ;

Route::get('/calc/{x}/{y}',[\App\Http\Controllers\NameController::class, 'calc']) ->name('calc') ;