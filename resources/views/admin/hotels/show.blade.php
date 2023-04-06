@extends('admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Додатково про готель
@endsection
@section('section')
    <div class="d-flex h-100">
        <div class="">
            <div class="card h-100 h4 m-3" style="">
                <div class="card-body">
                    <div><strong>Показник готелю:</strong></div>
                    <div>{{$hotel->id}}</div>
                    <div><strong>Назва:</strong></div>
                    <h4 class="card-title">{{$hotel->name}}</h4>
                    <div><strong>Місто:</strong></div>
                    <h4 class="card-title">{{$hotel->city}}</h4>
                    <div><strong>Адреса:</strong></div>
                    <div>{{$hotel->address}}</div>
                    <div><strong>Кількість зірок</strong>: {{$hotel->stars}}</div>
                    <div><strong>Середня вартість кімнати в готелі</strong>: {{$hotel->average_cost}}грн.</div>
                    <div><strong>Загальний опис</strong></div>
                    <p class="card-text">{{$hotel->description}}</p>
                    @foreach($hotel->photos as $photo)
                        <img src="{{ asset('storage/images/' . $photo->path) }}" width="100px" height="100px"
                             class="m-3" alt="Photo">
                    @endforeach
                </div>
{{--                @can('delete-post',$hotel)--}}
                <a href="{{route('admin.hotels.edit',$hotel->id)}}" class="btn btn-danger mt-4">Оновити інформацію про
                    готель</a>
                <form action="{{route('admin.hotels.destroy',$hotel->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-dark mt-4 d-block w-100" value="Видалити готель">
                </form>
{{--                @endcan--}}
            </div>
        </div>
    </div>
@endsection
