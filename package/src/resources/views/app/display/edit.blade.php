@extends('showcase::app.layouts.app') 
@section('title', 'Edit Display') 
@section('content')
<main class="col-md-6 showcase-display-main">
    <h1>Edit Display</h1>
    <form action="{{route('displays.update', compact('display'))}}" method="POST">
        {{method_field('PUT')}} {{csrf_field()}}
        <div class="form-group">
            <label for="name">Display Name</label>
            <input class="form-control" type="text" name="name" value="{{$display->name}}">
        </div>
        <div class="form-group">
            <label for="component_view">Component View</label>
            <input class="form-control" type="text" name="component_view" value="{{$display->component_view}}">
        </div>
        <div class="form-group">
            <label for="default_trophy_component_view">Default Trophy Component View</label>
            <input class="form-control" type="text" name="default_trophy_component_view" value="{{$display->default_trophy_component_view}}">
        </div>
        <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" name="force_trophy_default" value="yes" {{$display->force_trophy_default ? 'checked' : ''}}>
            <label class="form-check-label" for="force_trophy_default">Force Default Trophy View</label>
        </div>
        <button class="btn btn-success btn-block" type="submit">Update</button>
    </form>
</main>



@stop