<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\HotelCommentResource;
use App\Models\HotelComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $hotelComments = HotelComment::where('hotel_id', $id)->get();
        return HotelCommentResource::collection($hotelComments);
    }

//    public function show(Hotel $hotel)
//    {
//        return new HotelResource($hotel);
//    }
}
