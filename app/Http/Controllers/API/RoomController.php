<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $rooms = Room::where('hotel_id', $id)->get();
        return RoomResource::collection($rooms);
    }

//    public function show(Hotel $hotel)
//    {
//        return new HotelResource($hotel);
//    }
}
