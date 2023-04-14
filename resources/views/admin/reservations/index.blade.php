@extends('admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Додатково про готель
@endsection
@section('section')
    <div class="d-flex h-100 row">
        @foreach($reservations as $reservation)
            <div class="card h5 m-3 col-4" style="width: 22rem;">
                <div class="card-body">
                    <div><strong>Назва:</strong></div>
                    <h5 class="card-title">{{$reservation->name}}</h5>
                    <a href="{{route('admin.reservations.show',$reservation->id)}}" class="btn btn-danger mt-4">Відкрити інформацію про кімнату</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
