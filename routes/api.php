<?php

use App\Http\Controllers\API\HotelCommentController;
use App\Http\Controllers\API\HotelController;
use App\Http\Controllers\API\ReservationController;
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
Route::post('/reserve-room',[RoomController::class,'sendReservationEmail']);

Route::post('/addComment',[HotelCommentController::class,'store']);
Route::get('/hotelComments/{id}', [HotelCommentController::class, 'show']);
Route::put('/hotelComments/{id}',[HotelCommentController::class,'update']);
Route::delete('/hotelComments/{id}',[HotelCommentController::class,'destroy']);

Route::get('/pdf-download/{hotel}', [HotelController::class,'downloadPDF']);

Route::post('/add-reservation',[ReservationController::class,'store']);



