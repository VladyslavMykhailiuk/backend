<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomCommentRequest;
use App\Http\Requests\UpdateRoomCommentRequest;
use App\Models\Room;
use App\Models\RoomComment;
use Illuminate\Http\Request;

class RoomCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomComments = RoomComment::all();
        return view('/admin/roomcomments/index',compact('roomComments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room = new Room;
        $rooms = $room->getRoomList();
        return view('/admin/roomcomments/create',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomCommentRequest $request)
    {
        $data = $request->validated();

        $roomComment = RoomComment::create($data);



        return redirect()->route('admin.roomcomments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoomComment $roomComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomComment $roomComment)
    {
        $room = new Room;
        $rooms = $room->getRoomList();
        return view('/admin/roomcomments/edit',compact('roomComment','rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomCommentRequest $request, RoomComment $roomComment)
    {
        $data = $request->validated();

        $roomComment->update($data);
        return redirect()->route('admin.roomcomments.index',$roomComment->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomComment $roomComment)
    {
        $roomComment->delete();
        return redirect()->route('admin.roomcomments.index');
    }
}
