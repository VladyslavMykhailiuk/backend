<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;>
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
<svg class="bi me-2" width="40" height="32">
    <use xlink:href="#bootstrap"></use>
</svg>
<a href="{{route('admin.adminhome')}}" class="fs-4 link-info text-decoration-none mx-5 mb-5 ">Адмін панель</a>
</a>
<ul class="nav nav-pills flex-column mb-auto">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
           data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="h3 mx-5">Готелі</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{route('admin.hotels.index')}}">Список готелів</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{route('admin.hotels.create')}}">Додати готель</a></li>
    </div>
</ul>
<ul class="nav nav-pills flex-column mb-auto">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
           data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="h3 mx-5">Кімнати</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{route('admin.rooms.index')}}">Список кімнат</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{route('admin.rooms.create')}}">Додати кімнату</a></li>
    </div>
</ul>
<ul class="nav nav-pills flex-column mb-auto">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
           data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="h3 mx-5">Коментарі</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{route('admin.hotelcomments.index')}}">Список коментарів до готелів</a></li>
            <li><a class="dropdown-item" href="{{route('admin.hotelcomments.create')}}">Додати коментар до готелю</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{route('admin.roomcomments.index')}}">Список коментарів до кімнат</a></li>
            <li><a class="dropdown-item" href="{{route('admin.roomcomments.create')}}">Додати коментар до кімнати</a></li>
    </div>
</ul>
@can('view',auth()->user())
<ul class="nav nav-pills flex-column mb-auto">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
           data-bs-toggle="dropdown" aria-expanded="false">
            <strong class="h3 mx-4">Користувачі</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="{{route('admin.users.index')}}">Список користувачів</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{route('admin.users.create')}}">Додати користувача</a></li>
    </div>
</ul>
@endcan
<div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
       data-bs-toggle="dropdown" aria-expanded="false">
        <strong>{{auth()->user()->name}}</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
</div>
</div>
