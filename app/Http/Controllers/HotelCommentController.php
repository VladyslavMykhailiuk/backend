<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelCommentRequest;
use App\Http\Requests\UpdateHotelCommentRequest;
use App\Models\Hotel;
use App\Models\HotelComment;
use Illuminate\Http\Request;

class HotelCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelComments = HotelComment::all();
        return view('/admin/hotelcomments/index',compact('hotelComments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = new Hotel;
        $hotels = $hotel->getHotelList();
        return view('/admin/hotelcomments/create',compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelCommentRequest $request)
    {
        $data = $request->validated();

        $hotelComment = HotelComment::create($data);



        return redirect()->route('admin.hotelcomments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelComment $hotelComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelComment $hotelComment)

    {
        $hotel = new Hotel;
        $hotels = $hotel->getHotelList();
        return view('/admin/hotelcomments/edit',compact('hotelComment','hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelCommentRequest $request, HotelComment $hotelComment)
    {
        $data = $request->validated();

        $hotelComment->update($data);
        return redirect()->route('admin.hotelcomments.index',$hotelComment->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelComment $hotelComment)
    {
        $hotelComment->delete();
        return redirect()->route('admin.hotelcomments.index');
    }
}
