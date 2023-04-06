@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Створення готелю
@endsection
@section('section')
    <div class="d-flex h-100">
        <form class="m-auto p-5" action="{{route('admin.hotels.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="name">Назва</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="address">Адреса</label>
                <input type="text" name="address" class="form-control" id="address" placeholder="Введіть адресу" value="{{ old('address') }}">
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="city">Місто</label>
                <input type="text" name="city" class="form-control" id="city" placeholder="Введіть назву" value="{{ old('city') }}">
                @if ($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
            </div>
            <label for="description" class="col-md-2 col-form-label">Опис</label>
            <div class="col-md-10">
                <textarea name="description" name="description" id="description" class="form-control" cols="50" rows="10">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="stars">Зірки</label>
                <input type="text" name="stars" class="form-control" id="stars" placeholder="Введіть к-сть зірок" value="{{ old('stars') }}">
                @if ($errors->has('stars'))
                    <span class="text-danger">{{ $errors->first('stars') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="average_cost">Середня вартість проживання</label>
                <input type="number" name="average_cost" class="form-control" id="average_cost" placeholder="Введіть середню вартість" value="{{ old('average_cost') }}">
                @if ($errors->has('average_cost'))
                    <span class="text-danger">{{ $errors->first('average_cost') }}</span>
                @endif
            </div>
            <input type="file" name="images[]" multiple>
            <button type="submit" class="btn btn-primary mt-3">Додати</button>
        </form>
    </div>
@endsection
