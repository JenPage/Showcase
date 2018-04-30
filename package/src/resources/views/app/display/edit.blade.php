@extends('showcase::app.layouts.app')

@section('title', 'Edit Display')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form action="{{route('displays.update', compact('display'))}}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}
            <input type="text" name="name" value="{{$display->name}}">
            <input type="text" name="component_view" value="{{$display->component_view}}">
            <button type="submit">Submit</button>
        </form>
        </div>
    </div>
</main>
@stop