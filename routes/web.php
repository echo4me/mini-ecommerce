<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/login',[UserController::class,'index'])->name('login');
Route::post('login',[UserController::class,'login'])->name('post_login')->middleware('userauth');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/register',[UserController::class,'register']);
Route::post('/register',[UserController::class,'post_register'])->name('post_register');


Route::get('/search',[ProductController::class,'search'])->name('search');
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/details/{id}',[ProductController::class,'detail']);
Route::post('/add_to_cart',[ProductController::class,'addToCart'])->name('postcart');

Route::get('cartlist',[ProductController::class,'cartlist']);
Route::get('removecart/{id}',[ProductController::class,'removeItem']);

Route::get('/order_now',[ProductController::class,'orderNow']);
Route::post('orderplace',[ProductController::class,'orderPlace'])->name('orderplace');
Route::get('/myorders',[ProductController::class,'myOrders']);


