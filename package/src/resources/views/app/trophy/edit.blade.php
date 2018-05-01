@extends('showcase::app.layouts.app')

@section('title', 'Edit Trophy')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form action="{{route('trophies.store', compact('display'))}}" method="post">
            {{csrf_field()}}
            <div class="control-group">
            <input type="text" name="name" value="{{$trophy->name}}">
            </div>
        <input type="text" name="link" value="{{$trophy->link}}">
        <input type="text" name="image_url" value="{{$trophy->image_url}}">
        <textarea name="description" id="" cols="30" rows="10">{{$trophy->description}}</textarea>
            <input type="hidden" name="display_id" value="{{$display->id}}">
            <button type="submit">Add Trophy</button>
        </form>
        </div>
    </div>
</main>
@stop