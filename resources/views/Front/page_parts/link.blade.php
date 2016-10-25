@if(!empty($links))
<div class="text-left item-main-wrapper">
    <div class="items-list video-link-items-wrapper" style="margin: 30px auto">
        <ul class="list-inline list-unstyled text-center">
            @foreach($links as $link)
                <li class="video-link-item">
                    <div style="width: 100%; height:100%">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $link }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif