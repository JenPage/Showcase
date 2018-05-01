@extends('showcase::app.layouts.app')

@section('title', 'Show Display')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{$display->name}}</h1>
            @component("showcase::public.components.$display->component_view", compact('display'))@endcomponent
        </div>
    </div>
</main>
@stop

