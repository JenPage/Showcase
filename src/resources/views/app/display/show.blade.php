@extends('showcase::app.layouts.app') 
@section('title', 'Show Display') 
@section('content')
<main class="col-md-8 showcase-display-main">
    <div class="showcase-display-container showcase-display-show">
        <div class="showcase-display-admin">
            <div class="showcase-display-admin-left">
                <h1>{{$display->name}}</h1>
            </div>
            <div class="showcase-display-admin-right">
                <a href="/displays/{{$display->id}}/edit" class="btn btn-sm btn-warning">
                    <span>Edit</span>
                </a>
                <form action="/displays/{{$display->id}}" method="post">
                    {{csrf_field()}} {{method_field('PUT')}}
                    <button type="submit" class="btn btn-sm btn-danger"><span>Delete</span></button>
                </form>
            </div>
        </div>
        @showcaseDisplay($display) 
        <dl class="row">
            @foreach($display->getAttributes() as $key => $attribute)
            <dt class="col-sm-4">{{$key}}:</dt>
            <dd class="col-sm-8">{{$attribute}}</dd>
            @endforeach
        </dl>
    </div>
</main>


@stop