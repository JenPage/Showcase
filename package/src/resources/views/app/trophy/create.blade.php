@extends('showcase::app.layouts.app') 
@section('title', 'Create Trophy') 
@section('content')
<main class="col-md-6 col-md-offset-2">
    <h1>Add Trophy</h1>
    <form action="{{route('trophies.store', compact('display'))}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Trophy Name</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link">
        </div>
        <div class="form-group">
            <label for="image_url">Image URL</label>
            <input type="text" name="image_url">
        </div>
        <div class="form-group">
            <label for="description">Short Description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="hidden" name="display_id" value="{{$display->id}}">
        <button class="btn btn-success" type="submit">Add Trophy</button>
    </form>
</main>
@stop