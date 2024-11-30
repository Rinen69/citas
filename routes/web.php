<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;
use App\Http\Middleware\admin;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('/products', App\Http\Controllers\ProductController::class);
Route::middleware(['role:admin'])->group(function () {
    Route::resource('/products', CajaController::class);
});