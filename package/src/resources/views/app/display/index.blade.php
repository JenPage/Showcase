@extends('showcase::app.layouts.app')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>This is a test page, yo dawgfish</h1>
            @foreach($displays as $display)
            <p>{{ $display->name }}</p>
            @component("showcase::public.components.$display->component_view", compact('display'))@endcomponent
            @endforeach
        </div>
    </div>
</main>
@stop