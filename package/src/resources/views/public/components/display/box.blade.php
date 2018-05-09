<div class="showcase-display showcase-box">
    @foreach($display->trophies as $trophy)
    @showcaseTrophy($trophy, $display)
    @endforeach
</div>