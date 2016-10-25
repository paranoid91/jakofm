@extends("Front/page_parts/app")

@section("title"){{ trans('front.contact') }}@stop

@section("content")
    <div class="contact-content">
        @include('Front/page_parts/top-bg', ['img' => asset('frontend/img/contact-bg.jpg'), 'text1' => trans('front.contact'), 'text2' => 'კონტაქტი კონტაქტი'])
        <div class="contact-main container">
            <div class="row">
                <div class="col-lg-6 contact-main-l">
                    <div class="contact-cont-info text-left">
                        <div class="row contact-info-top">
                            <div class="col-md-6 col-lg-6">
                                <img src="{{ asset('frontend/img/icon-home-red.png') }}" alt="home">&nbsp;&nbsp;
                                <span>{{ trans('front.contact-address') }}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <img src="{{ asset('frontend/img/icon-email-red.png') }}" alt="mail">&nbsp;&nbsp;
                                <span>{{ 'JAKOFM@JAKOFM.GE' }}</span>
                            </div>
                        </div>
                        <div class="row contact-info-bot">
                            <div class="col-md-6 col-lg-6">
                                <img src="{{ asset('frontend/img/icon-phone-red.png') }}" alt="phone">&nbsp;&nbsp;
                                <span>{{ '574 123 456' }}</span>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <img src="{{ asset('frontend/img/icon-skype.png') }}" alt="skype">&nbsp;&nbsp;
                                <span>{{ 'JAKOFM' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="cont-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63602.46452518214!2d44.81998282113784!3d41.7205030928566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40440cd7e64f626b%3A0x61d084ede2576ea3!2z4YOX4YOR4YOY4YOa4YOY4YOh4YOY!5e0!3m2!1ska!2sge!4v1471947360591" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6 contact-main-r">
                    {!! Form::open(['action' => 'Frontend\PagesController@sendContactMail', 'method' => 'POST', 'class' => 'contact-form']) !!}
                    <div class="form-group">
                        {!! Form::text('name', null, ['placeholder' => trans('front.name'), 'class' => 'form-control cont-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('surname', null, ['placeholder' => trans('front.surname'), 'class' => 'form-control cont-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::email('email', null, ['placeholder' => trans('front.email'), 'class' => 'form-control cont-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('title', null, ['placeholder' => trans('front.subject'), 'class' => 'form-control cont-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('name', null, ['placeholder' => trans('front.text'), 'class' => 'form-control cont-control', 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('', ["class" => 'btn btn-block btn-default contact-submit-btn']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop