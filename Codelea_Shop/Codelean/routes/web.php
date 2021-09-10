<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);

Route::get('/shop/product/{id}',[App\Http\Controllers\Front\ShopController::class,'show']);
Route::post('/shop/product/{id}',[App\Http\Controllers\Front\ShopController::class,'postComment']);

Route::prefix('shop')->group(function (){
    Route::get('/shop/product/{id}',[App\Http\Controllers\Front\ShopController::class,'show']);

    Route::get('/',[App\Http\Controllers\Front\ShopController::class,'index']);
    Route::get('/{categoryName}',[App\Http\Controllers\Front\ShopController::class,'category']);
});
Route::prefix('cart')->group(function (){
    Route::get('add/{id}',[App\Http\Controllers\Front\CartController::class,'add']);
    Route::get('/',[App\Http\Controllers\Front\CartController::class,'index']);
    Route::get('delete/{rowId}',[App\Http\Controllers\Front\CartController::class,'delete']);
    Route::get('/destroy',[App\Http\Controllers\Front\CartController::class,'destroy']);
    Route::get('/update',[App\Http\Controllers\Front\CartController::class,'update']);
});
Route::prefix('checkout')->group(function () {
    Route::get('/',[App\Http\Controllers\Front\CheckOutController::class,'index']);
    Route::post('/',[App\Http\Controllers\Front\CheckOutController::class,'addOrder']);

    Route::get('/vnPayCheck',[App\Http\Controllers\Front\CheckOutController::class,'vnPayCheck']);
    Route::get('/result',[App\Http\Controllers\Front\CheckOutController::class,'result']);
});
