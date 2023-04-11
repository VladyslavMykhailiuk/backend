@extends('admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Додатково про готель
@endsection
@section('section')
    <div class="d-flex h-100">
        <div class="">
            <div class="card h-100 h4 m-3" style="max-width: 1500px">
                <div class="card-body">
                    <div><strong>Показник кімнати:</strong></div>
                    <h4 class="card-title">{{$room->id}}</h4>
                    <div><strong>Назва:</strong></div>
                    <h4 class="card-title">{{$room->name}}</h4>
                    <div><strong>Клас:</strong></div>
                    <div>{{$room->class}}</div>
                    <div><strong>Кількість персон</strong>: {{$room->persons}}</div>
                    <div><strong>вартість однієї ночі </strong>: {{$room->price}}грн.</div>
                    <div><strong>дата заїзду </strong>: {{$room->arrival_date}}</div>
                    <div><strong>дата виїзду</strong>: {{$room->departure_day}}</div>
                    <div><strong>Загальний опис</strong></div>
                    <p class="card-text">{{$room->description}}</p>
                    @foreach($room->photos as $photo)
                        <img src="{{ asset('storage/images/' . $photo->path) }}" width="100px" height="100px"
                             class="m-3" alt="Photo">
                    @endforeach
                </div>
                <a href="{{route('admin.rooms.edit',$room->id)}}" class="btn btn-danger mt-4">Оновити інформацію про
                    кімнату</a>
                <form action="{{route('admin.rooms.destroy',$room->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-dark mt-4 d-block w-100" value="Видалити кімнату">
                </form>
            </div>
        </div>
    </div>
@endsection
