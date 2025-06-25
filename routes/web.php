<?php

use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/RH/seeAllresources ', [ResourceController::class,'index']);
Route::resource('ResourceController', ResourceController::class);

