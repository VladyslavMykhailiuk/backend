@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Створення готелю
@endsection
@section('section')
    <div class="d-flex h-100">
        <form class="m-auto p-5" action="{{route('admin.roomcomments.update',$roomComment->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="room_id">Показник кімнати</label>
                <select name="room_id" class="form-control" id="room_id">
                    <option value="">Оберіть кімнату</option>
                    @foreach($rooms as $id => $name)
                        <option value="{{ $id }}" {{ $roomComment->room_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('room_id'))
                    <span class="text-danger">{{ $errors->first('room_id') }}</span>
                @endif
            </div>
            <label for="description" class="col-md-2 col-form-label">Коментар</label>
            <div class="col-md-10">
                <textarea name="description" name="description" id="description" class="form-control" cols="50" rows="10">{{$roomComment->description}}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-3">Додати</button>
        </form>
    </div>
@endsection
