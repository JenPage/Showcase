@extends('showcase::app.layouts.app')

@section('title', 'Show Trophy')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{$trophy->name}}</h1>
            @showcaseTrophy($trophy)
        </div>
    </div>
</main>
@stop

