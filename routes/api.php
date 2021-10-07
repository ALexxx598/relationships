<?php


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
        Route::group(['middleware' => 'role:admin'], function (){
            Route::apiResources([
                'user' => UserController::class,
            ]);

        });
        Route::group(['middleware' => 'role:user'], function (){

        });
});
