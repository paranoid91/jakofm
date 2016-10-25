@extends("Front/page_parts/app")

@section("title"){{ trans('front.partners') }}@stop

@section("content")
    <div class="partners-content">
        @include('Front/page_parts/top-bg', [
            'img' => asset('frontend/img/contact-bg.jpg'),
            'text1' => trans('front.our'),
            'text2' => trans('front.partners')
        ])
        <div class="partners-main">
            <div class="partners-logo text-left">
                <img src="{{ asset('frontend/img/handshake.png') }}" alt="handshake"/>&nbsp;
                <span>{{ trans('front.partners') }}</span>
            </div>
            <div class="partners-banners">
                @if(count($partners)>0)
                <ul class="list-inline list-unstyled">
                    @foreach($partners as $partner)<li><a href="{{ (!empty($partner->link)) ? $partner->link : "javascript:void(0);" }} " title="{{ $partner->title }}" target="_blank"><img src="{{ asset($partner->file) }}" alt="logo" class="img-responsive"></a></li>@endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
@stop