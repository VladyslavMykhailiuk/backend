<?php

use App\Http\Controllers\HotelCommentController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/admin',function (){
//    return view('admin');
//})->name('main');
//
//Route::get('/admin/hotels',function (){
//    return view('hotels');
//})->name('hotels');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::group([
    'as'=>'admin.',
    'prefix'=>'admin',
    'middleware' =>'admin',   // sanctum add !!
],function (){
    Route::get('/',function (){
        return view('admin.home');
    })->name('adminhome');
    Route::group([
        'as'=>'hotels.',
        'prefix'=>'hotels',
    ],function (){
        Route::get('/',[HotelController::class,'index'])->name('index');
        Route::get('/create',[HotelController::class,'create'])->name('create');
        Route::post('/',[HotelController::class,'store'])->name('store');
        Route::get('/{hotel}',[HotelController::class,'show'])->name('show');
        Route::get('/{hotel}/edit',[HotelController::class,'edit'])->name('edit');
        Route::put('/{hotel}',[HotelController::class,'update'])->name('update');
        Route::delete('/{hotel}',[HotelController::class,'destroy'])->name('destroy');
    }
    );
    Route::group([
        'as'=>'rooms.',
        'prefix'=>'rooms',
    ],function (){
        Route::get('/create',[RoomController::class,'create'])->name('create');
        Route::post('/',[RoomController::class,'store'])->name('store');
        Route::get('/{room}',[RoomController::class,'show'])->name('show');
        Route::get('/{room}/edit',[RoomController::class,'edit'])->name('edit');
        Route::put('/{room}',[RoomController::class,'update'])->name('update');
        Route::delete('/{room}',[RoomController::class,'destroy'])->name('destroy');
    }
    );

    Route::group([
        'as'=>'reservations.',
        'prefix'=>'reservations',
    ],function (){
        Route::get('/',[ReservationController::class,'index'])->name('index');
        Route::get('/create',[ReservationController::class,'create'])->name('create');
        Route::post('/',[ReservationController::class,'store'])->name('store');
        Route::get('/{reservation}',[ReservationController::class,'show'])->name('show');
        Route::get('/{reservation}/edit',[ReservationController::class,'edit'])->name('edit');
        Route::put('/{reservation}',[ReservationController::class,'update'])->name('update');
        Route::delete('/{reservation}',[ReservationController::class,'destroy'])->name('destroy');
        Route::get('/downloadpdf',[ReservationController::class,'download'])->name('downloadPDF');
    }
    );

    Route::group([
        'as'=>'hotelcomments.',
        'prefix'=>'hotelcomments',
    ],function (){
        Route::get('/',[HotelCommentController::class,'index'])->name('index');
        Route::get('/create',[HotelCommentController::class,'create'])->name('create');
        Route::post('/',[HotelCommentController::class,'store'])->name('store');
        Route::get('/{hotelComment}/edit',[HotelCommentController::class,'edit'])->name('edit');
        Route::put('/{hotelComment}',[HotelCommentController::class,'update'])->name('update');
        Route::delete('/{hotelComment}',[HotelCommentController::class,'destroy'])->name('destroy');
    }
    );

    Route::group([
        'as'=>'users.',
        'prefix'=>'users',
    ],function (){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/',[UserController::class,'store'])->name('store');
        Route::get('/{user}',[UserController::class,'show'])->name('show');
        Route::get('/{user}/edit',[UserController::class,'edit'])->name('edit');
        Route::put('/{user}',[UserController::class,'update'])->name('update');
        Route::delete('/{user}',[UserController::class,'destroy'])->name('destroy');
    }
    );
}
);
