@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Створення готелю
@endsection
@section('section')
    <div class="d-flex h-100">
        <form class="m-auto p-5" action="{{route('admin.rooms.update',$room->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="hotel_id">Показник готелю</label>
                <select name="hotel_id" class="form-control" id="hotel_id">
                    <option value="">Оберіть готель</option>
                    @foreach($hotels as $id => $name)
                        <option value="{{ $id }}" {{ $room->hotel_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('hotel_id'))
                    <span class="text-danger">{{ $errors->first('hotel_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Назва</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву" value="{{$room->name}}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <label for="description" class="col-md-2 col-form-label">Опис</label>
            <div class="col-md-10">
                <textarea name="description" name="description" id="description" class="form-control" cols="50" rows="10">{{$room->description}}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="class">Клас кімнати</label>
                <input type="text" name="class" class="form-control" id="class" placeholder="Введіть класс кімнати" value="{{$room->class}}">
                @if ($errors->has('class'))
                    <span class="text-danger">{{ $errors->first('class') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="persons">К-сть персон</label>
                <input type="number" name="persons" class="form-control" id="persons" placeholder="Введіть к-сть персон" value="{{$room->persons}}">
                @if ($errors->has('persons'))
                    <span class="text-danger">{{ $errors->first('persons') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="price">Ціна за ніч</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Введіть ціну за ніч" value="{{$room->price}}">
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="arrival_date">дата заїзду</label>
                <input type="date" name="arrival_date" class="form-control" id="arrival_date" placeholder="Введіть дату заїзду" value="{{$room->arrival_date}}">
                @if ($errors->has('arrival_date'))
                    <span class="text-danger">{{ $errors->first('arrival_date') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="departure_day">дата виїзду</label>
                <input type="date" name="departure_day" class="form-control" id="departure_day" placeholder="Введіть дату виїзду" value="{{$room->departure_day}}">
                @if ($errors->has('departure_day'))
                    <span class="text-danger">{{ $errors->first('departure_day') }}</span>
                @endif
            </div>
            <input type="file" name="images[]" multiple>
            <div class="images d-flex">
                @foreach($room->photos as $photo)
                    <div class="form-group">
                        <label for="photo_{{ $photo->id }}">Фото {{ $loop->iteration }}</label>
                        <div>
                            <img src="{{ asset('storage/images/'.$photo->path) }}" width="100px" height="100px" alt="Room photo" class="img-thumbnail">
                        </div>
                        <div>
                            <input type="checkbox" name="delete_photos[]" value="{{ $photo->id }}"> Видалити фото
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mt-3">Оновити</button>
        </form>
    </div>
@endsection
