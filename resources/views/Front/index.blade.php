@extends("Front/page_parts/app")

@section("title"){{ 'Jako FM' }}@stop

@section("css")
<link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}"/>
@stop

@if(!empty($slider))
    @section('slider')
        @include('Front/page_parts/slider')
    @stop
@endif

@section("content")
    <div class="home-content">
        <div class="serv-wrap indy-fade">
            <div class="serv-head container no-padding">
                <div class="serv-head-img">
                    <img src="{{ asset('frontend/img/asdsadsad1.png') }}" class="img-responsive" />
                </div>
                <h3 class="text-center">ჩვენი მომსახურება</h3>
            </div>
            <ul class="list-inline indy-fade-box">
                <li>
                    <div class="serv-item-wrapper hideMe">
                        <div class="serv-img" style="background-image:url('frontend/img/Untitled-sdsasd1.jpg');">
                            <div></div>
                            <a href="#">{{ trans('front.see-more') }}</a>
                        </div>
                        <div class="item-bottom">აუდიო პროდუქცია</div>
                    </div>
                </li>
                <li>
                    <div class="serv-item-wrapper hideMe">
                        <div class="serv-img" style="background-image:url('frontend/img/Untitled-1sd.jpg');">
                            <div></div>
                            <a href="#">{{ trans('front.see-more') }}</a>
                        </div>
                        <div class="item-bottom">აუდიო პროდუქცია</div>
                    </div>
                </li>
                <li>
                    <div class="serv-item-wrapper hideMe">
                        <div class="serv-img" style="background-image:url('frontend/img/Untitled-1.jpg');">
                            <div></div>
                            <a href="#">{{ trans('front.see-more') }}</a>
                        </div>
                        <div class="item-bottom">აუდიო პროდუქცია</div>
                    </div>
                </li>
                <li>
                    <div class="serv-item-wrapper hideMe">
                        <div class="serv-img" style="background-image:url('frontend/img/Untitled-2131.jpg');">
                            <div></div>
                            <a href="#">{{ trans('front.see-more') }}</a>
                        </div>
                        <div class="item-bottom">აუდიო პროდუქცია</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="voice-bank indy-fade">
            <div class="voice-bank-head container no-padding">
                <div class="voice-bank-img indy-fade-box">
                    <img src="{{ asset('frontend/img/microphone.png') }}" class="img-resposive"/>
                </div>
                <h3 class="indy-fade-box">{{ trans('front.voice-bank') }}</h3>
            </div>
            <div class="container no-padding voice-bank-main">
                <div class="voice-bank-buttons indy-fade-box">
                    <a href="#" class="act-buttn">{{ trans('front.georgian') }}</a>
                    <a href="#">{{ trans('front.english') }}</a>
                    <a href="#">{{ trans('front.russian') }}</a>
                </div>
                <div class="voice-bank-bg" style="background-color: #dadada">
                    <img src="{{ asset('frontend/img/blurmap.png') }}" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
{{--<script src="{{ asset('js/jquery.indyFadeBox.js') }}"></script>--}}
@stop