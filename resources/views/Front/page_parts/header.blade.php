<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Leri Bobokhidze"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @yield("meta")
    <title>@yield("title")</title>
    <link href="{{ asset("frontend/css/bootstrap.min.css") }}" rel="stylesheet">
    @yield("css")
    <link href="{{ asset("frontend/css/main.css") }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset("frontend/img/favicon.ico") }}" type="image/x-icon">
    @yield("header_script")
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <div class="main-carouserl-wrapper">
        @yield('slider')
        <div class="main-container">
            <header>
                <div class="container navbar-wrapper">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="{{ action('Frontend\PagesController@index') }}">
                                    <img src="{{ asset('frontend/img/logo.png') }}" class="img-responsive"/>
                                </a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ action('Frontend\PagesController@index') }}">{{ trans('front.main') }} <span class="sr-only">(current)</span></a></li>
                                    <li><a href="{{ action('Frontend\PagesController@aboutUs') }}">{{ trans('front.about_us') }}</a></li>
                                    <li><a href="{{ action('Frontend\PagesController@services') }}">{{ trans('front.services') }}</a></li>
                                    <li><a href="{{ action('Frontend\PagesController@voiceBank') }}">{{ trans('front.voice-bank') }}</a></li>
                                    <li><a href="{{ action('Frontend\PagesController@partners') }}">{{ trans('front.partners') }}</a></li>
                                    <li><a href="{{ action('Frontend\PagesController@portfolio') }}">{{ trans('front.portfolio') }}</a></li>
                                    <li><a href="{{ action('Frontend\PagesController@contact') }}">{{ trans('front.contact') }}</a></li>
                                    <li class="list-search-form">
                                        {!! Form::open(['action' => 'Frontend\PagesController@search', 'method' => 'GET']) !!}

                                            {!! Form::text('q', null, ['class' => 'search-text-hidden']) !!}{!! Form::submit('search', ['class' => 'search-submit-hidden']) !!}

                                        {!! Form::close() !!}
                                    </li>
                                    <div class="search-icon">
                                       {{-- <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/img/search.png') }}" alt="search"/>
                                        </a>
                                        {!! Form::open(['action' => 'Frontend\PagesController@search', 'method' => 'GET']) !!}
                                            <div class="form-group search-input-box">
                                                {!! Form::text('q', null, ['class' => 'form-control search-input', 'required']) !!}
                                            </div>
                                            <div class="form-group text-right search-btn-submt">
                                                {!! Form::submit('search', ["class" => 'btn btn-block btn-default search-btn']) !!}
                                            </div>
                                        {!! Form::close() !!}--}}
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>