<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Http\Resources\RoomResource;
use App\Jobs\ReserveRoomJob;
use App\Mail\Room\ReserveMail;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $query = Room::where('hotel_id', $id);

        if ($request->has('persons')) {
            $persons = $request->query('persons');
            if (!empty($persons)) {
                $query->where('persons','>=', $persons);
            }
        }

        if ($request->has('arrival_date')) {
            $arrival_date = $request->query('arrival_date');
            if (!empty($arrival_date)) {
                $query->where('arrival_date', '=', $arrival_date);
            }
        }

        if ($request->has('departure_day')) {
            $departure_day = $request->query('departure_day');
            if (!empty($departure_day)) {
                $query->where('departure_day', '=', $departure_day);
            }
        }

        if ($request->has('sort')) {
            $sort = $request->query('sort');
            if (!empty($sort)) {
                $query->orderBy('price',$sort);
            }
        }

        $rooms = $query->get();
        return RoomResource::collection($rooms);
    }

    public function sendReservationEmail(Request $request)
    {
        $selectedRoom = Room::find($request->room_id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $emailData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'room' => $selectedRoom,
        ];

        ReserveRoomJob::dispatch($emailData);

        $selectedRoom->delete();
    }

}
