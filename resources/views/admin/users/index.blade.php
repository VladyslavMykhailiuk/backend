@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Кімнати
@endsection

@section('section')
    <div class="d-flex h-100">
        <div class="d-flex">
            @foreach($users as $user)
                <div class="card h-25 h5 m-3" style="width: 22rem;">
                    <div class="card-body">
                        <div><strong>Показник юзера:</strong></div>
                        <h4 class="card-title">{{$user->id}}</h4>
                        <div><strong>Ім'я:</strong></div>
                        <h5 class="card-title">{{$user->name}}</h5>
                        <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-danger mt-4">Відкрити інформацію про користувача</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
