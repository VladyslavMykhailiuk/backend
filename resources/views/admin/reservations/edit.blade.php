@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Створення готелю
@endsection
@section('section')
    <div class="d-flex h-100">
        <form class="m-auto p-5" action="{{route('admin.reservations.update',$reservation->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="hotel_id">Показник готелю</label>
                <select name="hotel_id" class="form-control" id="hotel_id">
                    <option value="">Оберіть готель</option>
                    @foreach($hotels as $id => $name)
                        <option value="{{ $id }}" {{ $reservation->hotel_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('hotel_id'))
                    <span class="text-danger">{{ $errors->first('hotel_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Назва</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву" value="{{$reservation->name}}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="class">Клас кімнати</label>
                <input type="text" name="class" class="form-control" id="class" placeholder="Введіть класс кімнати" value="{{$reservation->class}}">
                @if ($errors->has('class'))
                    <span class="text-danger">{{ $errors->first('class') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="persons">К-сть персон</label>
                <input type="number" name="persons" class="form-control" id="persons" placeholder="Введіть к-сть персон" value="{{$reservation->persons}}">
                @if ($errors->has('persons'))
                    <span class="text-danger">{{ $errors->first('persons') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="price">Ціна за ніч</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Введіть ціну за ніч" value="{{$reservation->price}}">
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="arrival_date">дата заїзду</label>
                <input type="date" name="arrival_date" class="form-control" id="arrival_date" placeholder="Введіть дату заїзду" value="{{$reservation->arrival_date}}">
                @if ($errors->has('arrival_date'))
                    <span class="text-danger">{{ $errors->first('arrival_date') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="departure_day">дата виїзду</label>
                <input type="date" name="departure_day" class="form-control" id="departure_day" placeholder="Введіть дату виїзду" value="{{$reservation->departure_day}}">
                @if ($errors->has('departure_day'))
                    <span class="text-danger">{{ $errors->first('departure_day') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="person_name">дата виїзду</label>
                <input type="text" name="person_name" class="form-control" id="person_name" placeholder="Введіть ім'я персони" value="{{$reservation->person_name}}">
                @if ($errors->has('person_name'))
                    <span class="text-danger">{{ $errors->first('person_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="person_email">дата виїзду</label>
                <input type="text" name="person_email" class="form-control" id="person_email" placeholder="Введіть пошту персони" value="{{$reservation->person_email}}">
                @if ($errors->has('person_email'))
                    <span class="text-danger">{{ $errors->first('person_email') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary mt-3">Оновити</button>
        </form>
    </div>
@endsection
