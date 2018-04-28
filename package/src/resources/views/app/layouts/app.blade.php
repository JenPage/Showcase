<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('showcase::app.includes._stylesheets')
    @include('showcase::app.includes._header-scripts')
</head>
<body>
    @include('showcase::app.includes._header')
    @yield('content')
    @include('showcase::app.includes._footer')
</body>
</html>