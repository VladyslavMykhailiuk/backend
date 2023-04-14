<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function create()
    {
        $hotel = new Hotel;
        $hotels = $hotel->getHotelList();
        return view('/admin/rooms/create',compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $data = $request->validated();
        $room = Room::create([
            'hotel_id'=>$data['hotel_id'],
            'name' => $data['name'],
            'description' => $data['description'],
            'class' => $data['class'],
            'persons' => $data['persons'],
            'price' => $data['price'],
            'arrival_date' => $data['arrival_date'],
            'departure_day' => $data['departure_day'],
        ]);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);

                $photo = new RoomPhoto([
                    'path' => $filename
                ]);

                $room->photos()->save($photo);
            }
        }
        return redirect()->route('admin.hotels');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('/admin/rooms/show',compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)

    {
        $hotel = new Hotel;
        $hotels = $hotel->getHotelList();
        return view('/admin/rooms/edit',compact('room','hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $data = $request->validated();

        $room->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'class' => $data['class'],
            'persons' => $data['persons'],
            'price' => $data['price'],
            'arrival_date' => $data['arrival_date'],
            'departure_day' => $data['departure_day'],
        ]);

        if ($request->has('delete_photos')) {
            $deleted_photos = $request->input('delete_photos');
            foreach ($deleted_photos as $photo_id) {
                $photo = RoomPhoto::findOrFail($photo_id);
                Storage::delete('public/images/'.$photo->path);
                $photo->delete();
            }
        }

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);

                $photo = new RoomPhoto([
                    'path' => $filename
                ]);

                $room->photos()->save($photo);
            }
        }

        return redirect()->route('admin.rooms.show',$room->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.hotels.index');
    }
}
