<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCotroller;
use App\Http\Controllers\BookController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//request
Route::get('/request/path',[UserCotroller::class,'index']);

//user add
Route::post('/user/add',[UserCotroller::class,'add']);

//Bookadd
Route::post('/book/add',[BookController::class,'add']);

//Search
Route::get('/book/search',[UserCotroller::class,'search']);


