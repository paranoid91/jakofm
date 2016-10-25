@if(!empty($audio))
<div class="portfolio-player">
    @foreach($audio as $item)
    <div class="music-item">
        <div class="music-item-control">
            <audio preload="none" controls class="play-audio">
                <source src="{{ asset($item.'.ogg') }}"/>
                <source src="{{ asset($item.'.mp3') }}"/>
            </audio>
        </div>
    </div>
    @endforeach
</div>
@endif