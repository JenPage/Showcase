@extends('showcase::app.layouts.app')

@section('title', 'Create Trophy')

@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form action="{{route('trophies.store', compact('display'))}}" method="post">
            {{csrf_field()}}
            <div class="control-group">
                <input type="text" name="name">
            </div>
            <input type="text" name="link">
            <input type="text" name="image_url">
            <textarea name="description" id="" cols="30" rows="10"></textarea>
            <input type="hidden" name="display_id" value="{{$display->id}}">
            <button type="submit">Add Trophy</button>
        </form>
        </div>
    </div>
</main>
@stop