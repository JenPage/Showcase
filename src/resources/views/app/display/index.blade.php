@extends('layouts.app')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($displays as $display)
            <p>{{ $display->name }}</p>
            <p>{{ $display->type }}</p>
            @endforeach
        </div>
    </div>
</main>
@stop