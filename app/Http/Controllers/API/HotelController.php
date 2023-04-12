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
use Barryvdh\DomPDF\PDF;
use Pusher\Pusher;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->query('search');
        $perPage = $request->query('perPage') ?? 10;
        $page = $request->query('page') ?? 1;

        if (!empty($searchTerm)) {
            $hotels = Hotel::where('name', 'like', "%$searchTerm%")->paginate($perPage);
        } else {
            $hotels = Hotel::paginate($perPage);
        }

        return HotelResource::collection($hotels)->additional([
            'pagination' => [
                'currentPage' => $hotels->currentPage(),
                'perPage' => $hotels->perPage(),
                'totalPages' => $hotels->lastPage(),
                'totalItems' => $hotels->total(),
            ]
        ]);
    }

    public function show(Hotel $hotel)
    {
        return new HotelResource($hotel);
    }

    public function downloadPDF(Hotel $hotel)
    {
        $data = [
            'hotel' => $hotel
        ];

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.download', $data);
        $pdfUrl = storage_path('app/public/hotel_report.pdf');
        $pdf->save($pdfUrl);

        $pusher = new Pusher('82615ddfc1722620e052', '3d464fc2ff196bbd51f1', '1582666', [
            'cluster' => 'eu',
            'useTLS' => true
        ]);
        $pusher->trigger('mint-salute-672', 'pdf-ready', ['url' => asset('storage/hotel_report.pdf')]);

        return response()->json(['url' => asset('storage/hotel_report.pdf')]);
    }
}
