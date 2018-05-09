<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('showcase::app.includes._stylesheets')
    @include('showcase::app.includes._head-scripts')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('showcase::app.includes._header')
            <div class="col-md-10">
                @include('flash::message')
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('showcase::app.includes._footer')
</body>
</html>