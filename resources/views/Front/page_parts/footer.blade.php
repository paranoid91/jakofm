            <footer>
                <div class="footer-top">
                    <div class="footer-top-wrap container no-padding">
                        <ul class="list-inline contact-info">
                            <li><img src="{{ asset('frontend/img/home.png') }}" width="21"/> {{ trans('front.contact-address') }}</li>
                            <li><img src="{{ asset('frontend/img/phone.png') }}" width="21"/> {{ '574 123 456' }}</li>
                            <li class="contact-info-email"><img src="{{ asset('frontend/img/email.png') }}" width="21"/> {{ 'JAKOFM@JAKOFM.GE' }}</li>
                        </ul>
                        <div class="soc-icons">
                            <ul class="list-inline soc-list">
                                <li><a href="#"><img src="{{ asset('frontend/img/fb.png') }}" width="36" alt="facebook"></a></li>
                                <li><a href="#"><img src="{{ asset('frontend/img/gg.png') }}" width="36" alt="google+"></a></li>
                                <li><a href="#"><img src="{{ asset('frontend/img/tw.png') }}" width="36" alt="twitter"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-nav container no-padding">
                        <ul class="list-inline">
                            <li><a href="{{ action('Frontend\PagesController@aboutUs') }}">{{ trans('front.about_us') }}</a></li>
                            <li><a href="{{ action('Frontend\PagesController@services') }}">{{ trans('front.services') }}</a></li>
                            <li><a href="{{ action('Frontend\PagesController@voiceBank') }}">{{ trans('front.voice-bank') }}</a></li>
                            <li><a href="{{ action('Frontend\PagesController@partners') }}">{{ trans('front.partners') }}</a></li>
                            <li><a href="{{ action('Frontend\PagesController@portfolio') }}">{{ trans('front.portfolio') }}</a></li>
                            <li><a href="{{ action('Frontend\PagesController@contact') }}">{{ trans('front.contact') }}</a></li>
                        </ul>
                    </div>
                    <div class="footer-basement container no-padding">
                        <p class="text-left">&copy; {{ trans('front.rights-reserved') }} {{ date("Y") }}</p>
                        <div class="bottom-logo">
                            <a href="{{ action('Frontend\PagesController@index') }}">
                                <img src="{{ asset('frontend/img/footer-logo.png') }}" class="img-responsive"/>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<a href="#" class="scrollToTop"></a>
<script src="{{ asset("frontend/js/jquery-1.9.1.min.js") }}"></script>
<script src="{{ asset("frontend/js/bootstrap.min.js") }}"></script>
@yield("script")
<script src="{{ asset("frontend/js/lib.js") }}"></script>
</body>
</html>