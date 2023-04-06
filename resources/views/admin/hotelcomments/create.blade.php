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
                    <span class="text-danger">{{ $errors->first('hotel_id') }}</span>
                @endif
            </div>
            <label for="description" class="col-md-2 col-form-label">Коментар</label>
            <div class="col-md-10">
                <textarea name="description" name="description" id="description" class="form-control" cols="50" rows="10">{{ old('name') }}</textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-3">Додати</button>
        </form>
    </div>
@endsection
