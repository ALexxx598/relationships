<?php


use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => 'auth'] , function (){
    Route::apiResources([
        'user' => UserController::class,
        'order' => OrderController::class,
        'product' => ProductController::class,
    ]);
    Route::get('/showProductWithOrders/{id}', [ProductController::class , 'showProductWithOrders']);
    Route::get('/showAllOrders', [OrderController::class, 'showAllOrders']);
    Route::group(['middleware' => 'role:admin'], function (){

    });
    Route::group(['middleware' => 'role:user'], function (){

    });
});
