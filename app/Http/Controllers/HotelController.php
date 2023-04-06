<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;
use App\Models\HotelPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('/admin/hotels/index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/admin/hotels/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
$data = $request->validated();
        $hotel = Hotel::create([
            'name' => $data['name'],
            'city' => $data['city'],
            'address' => $data['address'],
            'description' => $data['description'],
            'stars' => $data['stars'],
            'average_cost' => $data['average_cost']
        ]);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);

                $photo = new HotelPhoto([
                    'path' => $filename
                ]);

                $hotel->photos()->save($photo);
            }
        }
        return redirect()->route('admin.hotels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
      return view('/admin/hotels/show',compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
//$this->authorize('delete-post',$hotel);
        return view('/admin/hotels/edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $data = $request->validated();

        $hotel->update([
            'name' => $data['name'],
            'city' => $data['city'],
            'address' => $data['address'],
            'description' => $data['description'],
            'stars' => $data['stars'],
            'average_cost' => $data['average_cost']
        ]);

        if ($request->has('delete_photos')) {
            $deleted_photos = $request->input('delete_photos');
            foreach ($deleted_photos as $photo_id) {
                $photo = HotelPhoto::findOrFail($photo_id);
                Storage::delete('public/images/'.$photo->path);
                $photo->delete();
            }
        }

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/images', $filename);

                $photo = new HotelPhoto([
                    'path' => $filename
                ]);

                $hotel->photos()->save($photo);
            }
        }
        return redirect()->route('admin.hotels.show',$hotel->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('admin.hotels.index');
    }
}
