<?php

use App\Http\Controllers\API\HotelCommentController;
use App\Http\Controllers\API\HotelController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::get('/hotels',[HotelController::class,'index']);
Route::get('/hotels/{hotel}',[HotelController::class,'show']);

Route::get('/hotels/{id}/rooms', [RoomController::class, 'index']);
Route::get('/hotels/{id}/hotelComments', [HotelCommentController::class, 'index']);
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::group(['middleware'=>'auth:sanctum'],function (){
//    Route::get('/get',[GetController::class,'__invoke']);
//});



