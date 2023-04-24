<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequset;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Hotel;
use App\Models\Reservation;
use Barryvdh\DomPDF\PDF;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('/admin/reservations/index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = new Hotel;
        $hotels = $hotel->getHotelList();
        return view('/admin/reservations/create',compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'person_name' => $data['person_name'],
            'person_email' => $data['person_email'],
        ]);

        $reservations = Reservation::all();

        $newData = [
            'reservations' => $reservations
        ];

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.reservation', $newData);
        $pdfUrl = storage_path('app/public/reservation_report.pdf');
        $pdf->save($pdfUrl);
        return redirect()->route('admin.reservations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('/admin/reservations/show',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $hotel = new Hotel;
        $hotels = $hotel->getHotelList();
        return view('/admin/reservations/edit',compact('reservation','hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        $data = $request->validated();

        $reservation->update([
            'name' => $data['name'],
            'class' => $data['class'],
            'persons' => $data['persons'],
            'price' => $data['price'],
            'arrival_date' => $data['arrival_date'],
            'departure_day' => $data['departure_day'],
            'person_name' => $data['person_name'],
            'person_email' => $data['person_email'],
        ]);

        $reservations = Reservation::all();

        $newData = [
            'reservations' => $reservations
        ];

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.reservation', $newData);
        $pdfUrl = storage_path('app/public/reservation_report.pdf');
        $pdf->save($pdfUrl);

        return redirect()->route('admin.reservations.show',$reservation->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        $reservations = Reservation::all();

        $newData = [
            'reservations' => $reservations
        ];

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.reservation', $newData);
        $pdfUrl = storage_path('app/public/reservation_report.pdf');
        $pdf->save($pdfUrl);

        return redirect()->route('admin.reservations.index');
    }

}
