@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Готелі
@endsection

@section('section')
    <div class="d-flex flex-wrap h-100">
        @foreach($hotelComments as $hotelComment)
            <div class="card  h5 m-3 col-4">
                <div class="card-body">
                    <div><strong>Показник готелю:</strong></div>
                    <div>{{$hotelComment->hotel_id}}</div>
                    <div><strong>Коментар:</strong></div>
                    <h5 class="card-title">{{$hotelComment->description}}</h5>
                    <a href="{{route('admin.hotelcomments.edit',$hotelComment->id)}}" class="btn btn-danger mt-4">Редагувати коментар</a>
                    <form action="{{route('admin.hotelcomments.destroy',$hotelComment->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-dark mt-4 d-block w-100" value="Видалити коментар">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

