@extends('showcase::app.layouts.app') 
@section('content')
<main class="col-md-6 col-md-offset-2 showcase-trophy-main">
    <h1>All Trophies</h1>
    @foreach($trophies as $trophy)
    <div class="showcase-trophy-container">
        <div class="showcase-trophy-admin">
            <div class="showcase-trophy-admin-left">
                <span>{{ $trophy->name }}</span>
            </div>
            <div class="showcase-trophy-admin-right">
                <a href="/trophies/{{$trophy->id}}/" class="btn btn-sm btn-info">
                    <span>View</span>
                </a>
                <a href="/trophies/{{$trophy->id}}/edit" class="btn btn-sm btn-warning">
                    <span>Edit</span>
                </a>
                <form action="/trophies/{{$trophy->id}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <button type="submit" class="btn btn-sm btn-danger"><span>Delete</span></button>
                </form>
            </div>
        </div>
        @showcaseTrophy($trophy)
    </div>
    @endforeach
</main>

@stop