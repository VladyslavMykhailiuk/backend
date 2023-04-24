@extends('admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Резервація
@endsection
@section('section')
    <div class="d-flex h-100">
        <div class="">
            <div class="card h-100 h4 m-3" style="max-width: 1500px">
                <div class="card-body">
                    <div><strong>Показник кімнати:</strong></div>
                    <h4 class="card-title">{{$reservation->id}}</h4>
                    <div><strong>Назва:</strong></div>
                    <h4 class="card-title">{{$reservation->name}}</h4>
                    <div><strong>Клас:</strong></div>
                    <div>{{$reservation->class}}</div>
                    <div><strong>Кількість персон</strong>: {{$reservation->persons}}</div>
                    <div><strong>вартість однієї ночі </strong>: {{$reservation->price}}грн.</div>
                    <div><strong>дата заїзду </strong>: {{$reservation->arrival_date}}</div>
                    <div><strong>дата виїзду</strong>: {{$reservation->departure_day}}</div>
                    <div><strong>Ім'я персони</strong>: {{$reservation->person_name}}</div>
                    <div><strong>Пошта персони</strong>: {{$reservation->person_email}}</div>
                </div>
                <a href="{{route('admin.reservations.edit',$reservation->id)}}" class="btn btn-danger mt-4">Оновити резервацію</a>
                <form action="{{route('admin.reservations.destroy',$reservation->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-dark mt-4 d-block w-100" value="Видалити резервацію">
                </form>
            </div>
        </div>
    </div>
@endsection
