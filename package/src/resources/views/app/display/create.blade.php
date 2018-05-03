@extends('showcase::app.layouts.app') 
@section('title', 'Add Display') 
@section('content')
<main class="col-sm-6 col-sm-offset-2">
    <h1>Create New Display</h1>
    <form action="{{route('displays.store')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Display Name</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="component_view">Component View</label>
            <input class="form-control" type="text" name="component_view">
        </div>
        <div class="form-group">
            <label for="default_trophy_component_view">Default Trophy Component View</label>
            <input class="form-control" type="text" name="default_trophy_component_view">
            <label for="force_trophy_default">Force Default</label>
            <input type="checkbox" name="force_trophy_default" value="yes">
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
</main>
@stop