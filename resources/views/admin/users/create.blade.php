@extends('.admin.layouts.mainadmin')
@section('title')
    Адмін панель -- Створення готелю
@endsection
@section('section')
    <div class="d-flex h-100">
        <form class="m-auto p-5" action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="name">Ім'я</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Введіть ім'я" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">e-mail</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Введіть e-mail" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="text" name="password" class="form-control" id="password" placeholder="Введіть пароль" value="{{ old('password') }}">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <div class="form-group">
                    <label for="role_id">Показник ролі</label>
                    <select name="role_id" class="form-control" id="role_id">
                        <option value="">Оберіть роль</option>
                        @foreach($roles as $id => $name)
                            <option value="{{ $id }}" {{ old('role_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role_id'))
                        <span class="text-danger">{{ $errors->first('role_id') }}</span>
                    @endif
                </div>
            <button type="submit" class="btn btn-primary mt-3">Додати</button>
        </form>
    </div>
@endsection
