@vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

<div class="d-flex h-100">
    @include('.admin.includes.sidebar')
    <section class="w-100">
        @yield('section')
    </section>
</div>
</body>
