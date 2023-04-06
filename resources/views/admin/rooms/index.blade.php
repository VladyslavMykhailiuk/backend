@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Кімнати
@endsection

@section('section')
    <div class="d-flex h-100">
        <div class="d-flex">
            @foreach($rooms as $room)
                <div class="card h-25 h5 m-3" style="width: 22rem;">
                    <div class="card-body">
                        <div><strong>Показник готелю:</strong></div>
                        <h4 class="card-title">{{$room->id}}</h4>
                        <div><strong>Назва:</strong></div>
                        <h5 class="card-title">{{$room->name}}</h5>
                        <a href="{{route('admin.rooms.show',$room->id)}}" class="btn btn-danger mt-4">Відкрити інформацію про кімнату</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
