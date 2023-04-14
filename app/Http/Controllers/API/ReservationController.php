<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ReservationRequset;
use App\Models\Reservation;
use Illuminate\Routing\Controller;

class ReservationController extends Controller
{
    public function store(ReservationRequset $request)
    {
        $data = $request->validated();
        $room = Reservation::create([
            'hotel_id'=>$data['hotel_id'],
            'name' => $data['name'],
            'class' => $data['class'],
            'persons' => $data['persons'],
            'price' => $data['price'],
            'arrival_date' => $data['arrival_date'],
            'departure_day' => $data['departure_day'],
        ]);

        $reservations = Reservation::all();

        $newData = [
            'reservations' => $reservations
        ];

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.reservation', $newData);
        $pdfUrl = storage_path('app/public/reservation_report.pdf');
        $pdf->save($pdfUrl);
    }
}
