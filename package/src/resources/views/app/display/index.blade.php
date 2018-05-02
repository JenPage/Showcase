@extends('showcase::app.layouts.app') 
@section('content')
<main class="col-md-6 col-md-offset-2">
    <h1>All Displays</h1>
    @foreach($displays as $display)
    <p>{{ $display->name }}</p>
    @component("showcase::public.components.$display->component_view", compact('display'))@endcomponent @endforeach
</main>

@stop