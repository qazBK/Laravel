<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


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
    
    Route::get('/car/delete/{id}', [\App\Http\Controllers\CarController::class, 'delete']) ->name('car.delete');

    Route::get('/color', [\App\Http\Controllers\ColorController::class, 'index']) ->name('color');

    Route::post('/color', [\App\Http\Controllers\ColorController::class, 'insert']);

    Route::get('/color/delete/{id}', [\App\Http\Controllers\ColorController::class, 'delete']) ->name('color.delete');

    //Route::post('/posts/comment/{id}', [\App\Http\Controllers\PostController::class, 'comment'])->name('comment');
});
Route::middleware("auth:web")->group(function () {
    Route::prefix('api')->group(function () {
        Route::prefix('v1')->group(function () {
            Route::name('api.')->group(function () {
                Route::apiResources(['color' => \App\Http\Controllers\ColorAPIController::class]);
                Route::apiResources(['car' => \App\Http\Controllers\CarAPIController::class]);
        });
    });
});
});
    Route::get('/basket/{id}', [\App\Http\Controllers\BascetController::class, 'detail']) ->name('basket');

    Route::get('/basket', [\App\Http\Controllers\BascetController::class, 'index']) ->name('basket');


    Route::get('/stret/{id}', [\App\Http\Controllers\StreetController::class, 'detail'])->name('street.detail');
    Route::get('/stret', [\App\Http\Controllers\StreetController::class, 'index'])->name('street');
