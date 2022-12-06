<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UserController;
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
Route::group(['prefix'=>'user','middleware'=>'auth:sanctum'],function(){
    Route::get('/all',[UserController::class,'all']);
    Route::get('/find/{id}',[UserController::class,'find'])->where('id','[0-9]+');
    Route::put('/update/{id}',[UserController::class,'update'])->where('id','[0-9]+');
    Route::delete('/delete/{id}',[UserController::class,'delete'])->where('id','[0-9]+');

});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);
