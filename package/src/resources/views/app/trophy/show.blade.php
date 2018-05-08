@extends('showcase::app.layouts.app')

@section('title', 'Show Trophy')

@section('content')
<main class="col-md-6 showcase-trophy-main">
        <div class="showcase-trophy-container showcase-trophy-show">
            <div class="showcase-trophy-admin">
                <div class="showcase-trophy-admin-left">
                    <h1>{{$trophy->name}}</h1>
                </div>
                <div class="showcase-trophy-admin-right">
                    <a href="/trophies/{{$trophy->id}}/edit" class="btn btn-sm btn-warning">
                        <span>Edit</span>
                    </a>
                    <form action="/trophies/{{$trophy->id}}" method="post">
                        {{csrf_field()}} {{method_field('PUT')}}
                        <button type="submit" class="btn btn-sm btn-danger"><span>Delete</span></button>
                    </form>
                </div>
            </div>
            @showcaseTrophy($trophy) 
            <dl class="row">
                @foreach($trophy->getAttributes() as $key => $attribute)
                <dt class="col-sm-4">{{$key}}:</dt>
                <dd class="col-sm-8">{{$attribute}}</dd>
                @endforeach
            </dl>
        </div>
    </main>
@stop

