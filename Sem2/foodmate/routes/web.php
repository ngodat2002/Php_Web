<?php

use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CheckOutController;
use App\Http\Controllers\Front\AdminController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\RestaurantController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[HomeController::class,'index']);

Route::get('/redirects',[HomeController::class,'redirects']);

Route::prefix('/food')->group(function (){
    Route::get('/',[AdminController::class,'product']);
});
Route::get('/add',[AdminController::class,'add']);
Route::get('/delete_user/{id}',[AdminController::class,'delete_user']);
Route::get('/update_user/{id}',[AdminController::class,'update_user']);
Route::post('/update_userview/{id}',[AdminController::class,'update_userview']);
Route::post('/upload_user',[AdminController::class,'upload_user']);
Route::get('/create',[AdminController::class,'create']);
Route::get("/update-food/{id}",[AdminController::class,"update_food"]);
Route::post('/update/{id}',[AdminController::class,'update']);
Route::post('/upload',[AdminController::class,'upload']);
Route::get('/delete/{id}',[AdminController::class,'delete']);
Route::get('/restaurants',[AdminController::class,'restaurants']);
Route::get('/delete_res/{id}',[AdminController::class,'delete_res']);
Route::get('/orders',[AdminController::class,'index']);

Route::get('/view/{id}',[AdminController::class,'view']);
Route::put('update-order/{id}',[AdminController::class,'update_order']);

Route::get('/order-history',[AdminController::class,'orderhistory'])->name('order-history');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');

})->name('dashboard');


Route::prefix('menu')->group(function (){
    Route::get('/',[HomeController::class,'index']);
    Route::get('/{categoryName}',[HomeController::class,'category']);
});

Route::middleware(['auth'])->group(function (){
    Route::prefix('cart')->group(function (){
        Route::get('add/{id}',[CartController::class,'add']);
        Route::get('/',[CartController::class,'index']);
        Route::get('delete/{rowId}',[CartController::class,'delete']);
        Route::get('/destroy',[CartController::class,'destroy']);
        Route::get('/update',[CartController::class,'update']);
    });
    Route::prefix('checkout')->group(function (){
        Route::get('/',[CheckOutController::class,'index']);
        Route::post('/',[CheckOutController::class,'addOrder']);
    });
Route::get('my-order',[UserController::class,'index'])->name('my-orders');
    Route::post('my-order',[UserController::class,'search'])->name('my-orders');
Route::get('view-order/{id}',[UserController::class,'view']);
Route::get('delete-order/{id}',[UserController::class,'delete_order']);
});
Route::get('restaurant/show/{id}',[RestaurantController::class,'show']);
Route::prefix('restaurant')->group(function (){
    Route::get('/',[RestaurantController::class,'index']);
    Route::get('restaurant/show/{id}',[RestaurantController::class,'show']);
    Route::get('restaurant/show/{id}/{categoryName}',[RestaurantController::class,'category']);
});
Route::get('restaurant/show/{id}/{categoryName}',[RestaurantController::class,'category']);
Route::get('about',[AboutController::class,'index']);
Route::get('contact',[ContactController::class,'index']);
Route::get('yourcart',[HomeController::class,'your_cart'])->name('yourcart');
