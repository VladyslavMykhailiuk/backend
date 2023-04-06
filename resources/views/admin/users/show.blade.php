@extends('admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Додатково про готель
@endsection
@section('section')
    <div class="d-flex h-100">
        <div class="">
            <div class="card h-100 h4 m-3 w-100">
                <div class="d-flex">
                        <div class="card h-25 h5 m-3">
                            <div class="card-body">
                                <div><strong>Показник юзера:</strong></div>
                                <h4 class="card-title">{{$user->id}}</h4>
                                <div><strong>Ім'я:</strong></div>
                                <h5 class="card-title">{{$user->name}}</h5>
                                <div><strong>E-mail:</strong></div>
                                <h5 class="card-title">{{$user->email}}</h5>
                                <div><strong>Показник ролі:</strong></div>
                                <h5 class="card-title">{{$user->role_id}}</h5>
                            </div>
                        </div>
                </div>
                <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-danger mt-4">Оновити інформацію про
                    користувача</a>
                <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-dark mt-4 d-block w-100" value="Видалити користувача">
                </form>
            </div>
        </div>
    </div>
@endsection
