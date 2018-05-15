@extends('showcase::app.layouts.app') 
@section('content')
<main class="col-md-8 showcase-display-main">
    <h1>All Displays</h1>
    @foreach($displays as $display)
    <div class="showcase-display-container">
        <div class="showcase-display-admin">
            <div class="showcase-display-admin-left">
                <span>{{ $display->name }}</span>
            </div>
            <div class="showcase-display-admin-right">
                <a href="/displays/{{$display->id}}/" class="btn btn-sm btn-info">
                    <span>View</span>
                </a>
                <a href="/displays/{{$display->id}}/edit" class="btn btn-sm btn-warning">
                    <span>Edit</span>
                </a>
                <form action="/displays/{{$display->id}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-sm btn-danger"><span>Delete</span></button>
                </form>
            </div>
        </div>
        @showcaseDisplay($display)
    </div>
    @endforeach
</main>

@stop