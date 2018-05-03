@extends('showcase::app.layouts.app') 
@section('title', 'Edit Display') 
@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                    <label for="force_trophy_default">Force Default</label>
                <input type="checkbox" name="force_trophy_default" value="yes" {{$display->force_trophy_default ? 'checked' : ''}}>
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
</main>

@stop