@if(!empty($images))
<div class="text-left item-main-wrapper">
    <div class="items-list video-link-items-wrapper" style="margin: 30px auto">
        <ul class="list-inline list-unstyled text-center">
            @foreach($images as $image)
                <li class="video-link-item">
                    <div style="width: 100%; height:100%">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $image }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endif