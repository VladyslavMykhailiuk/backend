@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Створення готелю
@endsection
@section('section')
    <div class="d-flex h-100">
        <form class="m-auto p-5" action="{{route('admin.hotelcomments.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="hotel_id">Показник готелю</label>
                <select name="hotel_id" class="form-control" id="hotel_id">
                    <option value="">Оберіть готель</option>
                    @foreach($hotels as $id => $name)
                        <option value="{{ $id }}" {{ old('hotel_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('hotel_id'))
                    <div class="text-danger">{{ $errors->first('hotel_id') }}</div>
                @endif
                <label  for="user_id">Показник користувача</label>
                <select name="user_id" class="form-control" id="user_id">
                    <option value="">Оберіть користувача</option>
                    @foreach($users as $id => $name)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                    <div class="text-danger">{{ $errors->first('user_id') }}</div>
                @endif
            </div>
            <label for="description" class="col-md-2 col-form-label">Коментар</label>
            <div class="col-md-10">
                <textarea name="description" name="description" id="description" class="form-control" cols="50" rows="10">{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <div class="text-danger">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-3">Додати</button>
        </form>
    </div>
@endsection
