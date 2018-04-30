@extends('showcase::app.layouts.app')

@section('title', 'Add Display')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form action="{{route('displays.store')}}" method="POST">
            {{csrf_field()}}
            <input type="text" name="name">
            <input type="text" name="component_view">
            <button type="submit">Submit</button>
        </form>
        </div>
    </div>
</main>
@stop