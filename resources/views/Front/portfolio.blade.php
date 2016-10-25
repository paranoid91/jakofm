@extends("Front/page_parts/app")

@section("title"){{ 'Portfolio' }}@stop
@section('css')
    <style>


    </style>
@stop
@section("content")
    <div class="portfolio-content">
        @include('Front/page_parts/top-bg', [
            'img' => asset('frontend/img/pexels-photo.jpg'),
            'text1' => 'პორტფოლიო',
            'text2' => 'პორტფოლიო პორტფოლიო',
            'class' => 'bg-top'
        ])
        <div class="portfolio-main">
            <div class="portfolio-audio">
                <div class="container portfolio-aduio-cont text-left">
                    <div class="port-auido-top">
                        <img src="{{ asset('frontend/img/headphone.png') }}" alt="headphones">&nbsp;&nbsp;
                        <span>აუდიო</span>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <div class="portfolio-player">
                        <div class="music-item">
                            <div class="music-item-control">
                                <audio preload="none" controls class="play-audio">
                                    <source src="{{ asset('uploads/audio/audio.ogg') }}"/>
                                    <source src="{{ asset('uploads/audio/audio.mp3') }}"/>
                                    <source src="{{ asset('uploads/audio/audio.wav') }}"/>
                                </audio>
                                {{--<span class="glyphicon glyphicon-pause"></span>--}}
                            </div>
                        </div>
                        <div class="music-item">
                            <div class="music-item-control">
                                <audio preload="none" controls class="play-audio">
                                    <source src="{{ asset('uploads/audio/audio.ogg') }}"/>
                                    <source src="{{ asset('uploads/audio/audio.mp3') }}"/>
                                    <source src="{{ asset('uploads/audio/audio.wav') }}"/>
                                </audio>
                                {{--<span class="glyphicon glyphicon-play"></span>--}}
                            </div>
                        </div>
                        <div class="music-item">
                            <div class="music-item-control">
                                <audio preload="none" controls class="play-audio">
                                    <source src="{{ asset('uploads/audio/audio.ogg') }}"/>
                                    <source src="{{ asset('uploads/audio/audio.mp3') }}"/>
                                    <source src="{{ asset('uploads/audio/audio.wav') }}"/>
                                </audio>
                               {{-- <span class="glyphicon glyphicon-play"></span>--}}
                            </div>
                        </div>
                        <div class="music-item">
                            <div class="music-item-control">
                                <audio preload="none" controls class="play-audio">
                                    <source src="{{ asset('uploads/audio/audio.ogg') }}"/>
                                    <source src="{{ asset('uploads/audio/audio.mp3') }}"/>
                                    <source src="{{ asset('uploads/audio/audio.wav') }}"/>
                                </audio>
                                {{--<span class="glyphicon glyphicon-play"></span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portfolio-item" style="background-color: #e6e6e6">
                @include('Front/page_parts/item', [
                    'img' => 'frontend/img/videocamera.png',
                     'title' => 'ვიდეო',
                     'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                     'hover_img' => 'frontend/img/add-plus.png',
                     'images' => [
                        'frontend/img/Untitlsdsed-1.jpg', 'frontend/img/Untitlesadsadd-1.jpg', 'frontend/img/asdasdasd.jpg', 'frontend/img/Untitled-1.jpg'
                     ]
                ])
            </div>
            <div class="portfolio-item" style="background-color: #f2f2f2">
                @include('Front/page_parts/item', [
                    'img' => 'frontend/img/photocamera.png',
                     'title' => 'ფოტო',
                     'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                     'hover_img' => 'frontend/img/add-plus.png',
                     'images' => [
                        'frontend/img/Untitlsdsed-1.jpg', 'frontend/img/Untitlesadsadd-1.jpg', 'frontend/img/asdasdasd.jpg', 'frontend/img/Untitled-1.jpg'
                     ]
                ])
            </div>
            <div class="portfolio-item" style="background-color: #e6e6e6">
                @include('Front/page_parts/item', [
                    'img' => 'frontend/img/lines.png',
                     'title' => 'მობილური სტუდია',
                     'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                     'hover_img' => 'frontend/img/add-plus.png',
                     'images' => [
                        'frontend/img/Untitlsdsed-1.jpg', 'frontend/img/Untitlesadsadd-1.jpg', 'frontend/img/asdasdasd.jpg', 'frontend/img/Untitled-1.jpg'
                     ]
                ])
            </div>
            <div class="portfolio-item" style="background-color: #f2f2f2">
                @include('Front/page_parts/item', [
                    'img' => 'frontend/img/calendar.png',
                     'title' => 'ივენთ მენეჯმენტი',
                     'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
                     'hover_img' => 'frontend/img/add-plus.png',
                     'images' => [
                        'frontend/img/Untitlsdsed-1.jpg', 'frontend/img/Untitlesadsadd-1.jpg', 'frontend/img/asdasdasd.jpg', 'frontend/img/Untitled-1.jpg'
                     ]
                ])
            </div>

        </div>
    </div>
@stop
@section('script')
<script src="{{ asset('frontend/js/audioplayer.min.js') }}"></script>
<script>
    $( function()
    {
        $( '.play-audio' ).audioPlayer();
    });
</script>
@stop