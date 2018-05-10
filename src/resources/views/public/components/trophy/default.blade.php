<div class="showcase-trophy">
    <a href="{{$trophy->link ?: '#'}}">
        <div class="showcase-trophy-image">
            <img src="{{$trophy->image_url}}" alt="{{$trophy->name}}">
        </div>
        <div class="showcase-trophy-title">
            <span>{{$trophy->name}}</span>
        </div>
    </a>
</div>