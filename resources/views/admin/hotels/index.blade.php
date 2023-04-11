@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Готелі
@endsection

@section('section')
    <div class="d-flex h-100 row">
        @foreach($hotels as $hotel)
            <div class="card h5 m-3 col-4" style="width: 22rem;">
                <div class="card-body">
                    <div><strong>Показник готелю:</strong></div>
                    <div>{{$hotel->id}}</div>
                    <div><strong>Назва:</strong></div>
                    <h5 class="card-title">{{$hotel->name}}</h5>
                    <a href="{{route('admin.hotels.show',$hotel->id)}}" class="btn btn-danger mt-4">Відкрити інформацію про готель</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

