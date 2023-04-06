@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Готелі
@endsection

@section('section')
    <div class="d-flex h-100">
        <div class="d-flex">
            @foreach($roomComments as $roomComment)
                <div class="card h-25 h5 m-3" style="width: 22rem;">
                    <div class="card-body">
                        <div><strong>Показник кімнати:</strong></div>
                        <div>{{$roomComment->room_id}}</div>
                        <div><strong>Коментар:</strong></div>
                        <h5 class="card-title">{{$roomComment->description}}</h5>
                        <a href="{{route('admin.roomcomments.edit',$roomComment->id)}}" class="btn btn-danger mt-4">Редагувати коментар</a>
                        <form action="{{route('admin.roomcomments.destroy',$roomComment->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-dark mt-4 d-block w-100" value="Видалити коментар">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

