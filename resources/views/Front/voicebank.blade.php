@extends("Front/page_parts/app")

@section("title"){{ 'Voice Bank' }}@stop
@section("css")
<style>
    .audioplayer-stopped .audioplayer-playpause a{
        left:130% !important;
    }
    .audioplayer-playing .audioplayer-playpause a{
        left:110% !important;
    }
</style>
@stop
@section("content")
<div class="voice-bank-container">
    @include('Front/page_parts/top-bg', [
        'img' => asset('frontend/img/Untitledfdsfd-1.jpg'),
        'text1' => trans('front.voice-bank'),
        'text2' => trans('front.voice-bank-text-2'),
        'class' => 'bg-top'
    ])
    @if(count($cats) > 0)
    <div class="voice-bank-main">
        <div class="voice-bank-tabs">
            <ul class="nav nav-tabs" role="tablist">
                @for($i=0; $i < count($cats); $i++)
                <li role="presentation" @if($i==0) {{"class=active"}} @endif><a href="#{{ $cats[$i]->name }}" aria-controls="{{ $cats[$i]->name }}" role="tab" data-toggle="tab">{{ trans('front.'.$cats[$i]->name) }}</a></li>
                @endfor
            </ul>
            <div style="background-color: #e6e6e6">
                <div class="voice-bank-info container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 voice-bank-info-mic vbc-item">
                            <img src="{{ asset('frontend/img/microphone.png') }}" alt="microphone"/>&nbsp;&nbsp;
                            <span>{{ trans('front.voice-bank') }}</span>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 voice-bank-info-phone vbc-item">
                            <img src="{{ asset('frontend/img/icon-phone-red.png') }}" alt="phone">
                            <span>{{ '995 598 124 578' }}</span>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 voice-bank-info-mail vbc-item">
                            <img src="{{ asset('frontend/img/icon-email-red.png') }}" alt="phone">
                            <span>{{ 'jakofm@jakofm.ge' }}</span>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 voice-bank-info-filter vbc-item text-right">
                            <a href="javascript:void(0);" id="filter-button">{{ trans('front.filter') }}</a>
                            <div class="voice-filters">
                                <ul class="list-unstyled list-inline filters-list tagsort-tags-container">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content container">
                @for($i=0; $i < count($cats); $i++)
                <div role="tabpanel" class="vcb-tab tab-pane fade in @if($i==0) active @endif" id="{{ $cats[$i]->name }}">
                    <ul class="list-unstyled list-inline vcb-ppl-list">
                    <li data-item-tags="{{ trans('front.man') }}, {{ trans('front.woman') }}, {{ trans('front.academic') }}, {{ trans('front.artistic') }}, {{ trans('front.commercial') }}, {{ trans('front.vocal') }}" class="item-to-filter" style="display: none"></li>
                    @if(count($authors) > 0)
                        @foreach($authors as $author)
                        @if(count($files = $author->audio()->where('cat_id',$cats[$i]->id)->get()) > 0)
                        <li class="author-data item-to-filter" data-item-tags="{{ getAudioCats($author->categories()->first()->name, $files) }}">
                            <div class="vcb-ppl-wrapper">
                                <div class="vcb-ppl-bg" style="background-image: url({{ asset($author->files()->where('type','image')->first()->name) }})">
                                    <div class="ppl-audio-hov">
                                        @foreach($files as $file)
                                        <div class="ppl-audio-wrapper">
                                            <h3 class="text-center mini-audio-cap">{{ $file->audio_type }}</h3>
                                            <div class="ppl-audio-sign">
                                                <audio preload="none" controls class="play-audio">
                                                    <source src="{{ asset($file->path . '.mp3') }}"/>
                                                    <source src="{{ asset($file->path . '.ogg') }}"/>
                                                </audio>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <span>{{ $author->name }}</span>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        <div class="link-see-more">
                            <a href="#" id="see-more-authors-link">{{ trans('front.see-more') }}</a>
                        </div>
                    @endif
                    </ul>
                </div>
                @endfor
            </div>
        </div>
    </div>
    @endif
</div>
@stop
@section('script')
<script src="{{ asset('frontend/js/audioplayer.min.js') }}"></script>
<script src="{{ asset('frontend/js/tagsort.min.js') }}"></script>
@stop