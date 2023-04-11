<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelCommentRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelCommentRequest;
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

    public function store(StoreHotelCommentRequest $request)
    {
        $data = $request->validated();

        $hotelComment = HotelComment::create($data);
    }


    public function show($id)
    {
        $hotelComment = HotelComment::findOrFail($id);
        return new HotelCommentResource($hotelComment);
    }

    public function update(UpdateHotelCommentRequest $request, $id)
    {
        $hotelComment = HotelComment::findOrFail($id);
        $data = $request->validated();
        $hotelComment->update($data);
        return new HotelCommentResource($hotelComment);
    }

    public function destroy(HotelComment $hotelComment,$id)
    {
        $hotelComment = HotelComment::findOrFail($id);
        $hotelComment->delete($hotelComment);
    }



}
