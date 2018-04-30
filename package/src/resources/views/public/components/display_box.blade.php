<div class="showcase-display showcase-box">
    @foreach($display->trophies as $trophy)
    <div class="showcase-trophy">
        <div class="showcase-trophy-image">
        <img src="{{$trophy->image_url}}" alt="{{$trophy->alt}}">
        </div>
        <div class="showcase-trophy-title">
        <span>{{$trophy->name}}</span>
        </div>
    </div>
    @endforeach
</div>