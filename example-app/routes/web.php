<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



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





//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------/


Route::middleware("guest:web")->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_process');

    Route::get('/forgot', [\App\Http\Controllers\AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [\App\Http\Controllers\AuthController::class, 'forgot'])->name('forgot_process');
});

Route::middleware("auth:web")->group(function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    
    Route::get('/car', [\App\Http\Controllers\CarController::class, 'index']) ->name('car');

    Route::post('/car', [\App\Http\Controllers\CarController::class, 'insert']);

    Route::get('/color', [\App\Http\Controllers\ColorController::class, 'index']) ->name('color');

    Route::post('/color', [\App\Http\Controllers\ColorController::class, 'insert']);
    //Route::post('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
});