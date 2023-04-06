<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\RoomCommentResource;
use App\Models\RoomComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $roomComments = RoomComment::where('hotel_id', $id)->get();
        return HotelCommentResource::collection($roomComments);
    }

//    public function show(Hotel $hotel)
//    {
//        return new HotelResource($hotel);
//    }
}
