{{--
<div class="container text-left item-main-wrapper">
    @if(!is_null($img))
        <div class="port-item-top">
            <img src="{{ asset($img) }}">&nbsp;&nbsp;
            <span>{{ $title }}</span>
        </div>
    @endif
    @if(!is_null($text))<p>{{ $text }}</p>@endif
    <div class="items-list container">
        <ul class="list-inline list-unstyled text-center">
            @foreach($images as $image)
                <li>
                    <div class="dark-block">
                        <div class="item-appear" style="background-image: url({{ asset($hover_img) }})"></div>
                        <img src="{{ asset($image) }}" class="img-responsive"/>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>--}}

@if(!empty($images))
<div class="portfolio-item">
    <div class="container text-left item-main-wrapper">
        <div class="items-list container">
            <ul class="list-inline list-unstyled text-center">
                @foreach($images as $image)
                    <li>
                        <div class="dark-block">
                            <div class="item-appear" style="background-image: url({{ asset($hover_img) }})"></div>
                            <img src="{{ asset($image) }}" class="img-responsive"/>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif