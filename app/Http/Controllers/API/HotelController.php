<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\HotelResource;
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
      return HotelResource::collection($hotels);
    }

    public function show(Hotel $hotel)
    {
        return new HotelResource($hotel);
    }
}
