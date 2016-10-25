@extends("Front/page_parts/app")

@section("title"){{ $page->title }}@stop

@section("content")
    <div class="voice-bank-container">
        @include('Front/page_parts/top-bg', [
            'img' => asset($page->img),
            'text1' => $page->headline_1,
            'text2' => $page->headline_2,
            'class' => (strpos($_SERVER['REQUEST_URI'], 'services') > 0 ) ? 'bg-bottom' : 'bg-top'
        ])
        <div class="voice-bank-main" style="background-color: #e6e6e6">
            <div class="voice-bank-tabs services-tabs">
                @if(count($tabs = $page->tabs()->where('lang',\App::getLocale())->get()) > 0)
                <ul class="nav nav-tabs" role="tablist">
                    @for($i=0; $i<count($tabs); $i++)
                        <li role="presentation" @if($i==0) class="active" @endif><a href="#{{ addUnderscore($tabs[$i]->tab_name) }}" aria-controls="{{ addUnderscore($tabs[$i]->tab_name) }}" role="tab" data-toggle="tab">{{ $tabs[$i]->title }}</a></li>
                    @endfor
                </ul>
                <div style="background-color: #e6e6e6">
                    <div class="tab-content text-left container services-container">
                        @for($i=0; $i<count($tabs); $i++)
                        <div role="tabpanel" class="services-tab vcb-tab tab-pane fade in @if($i==0) active @endif" id="{{ addUnderscore($tabs[$i]->tab_name) }}">
                            @if(!is_null($tab_data = \App\TabData::where('tab_id', $tabs[$i]->lang_id)->where('lang', \App::getLocale())->get()))
                             @foreach($tab_data as $tb)
                               <div class="container">
                                   <div class="tab-data-wrapper">
                                       <img class="tab-span" src="{{ asset($tb->icon) }}"/>&nbsp;&nbsp;
                                       <span class="tab-span">{{ $tb->title }}</span>
                                       <div class="tab-text">
                                           {!! $tb->text !!}
                                       </div>
                                       <div class="tab-files">
                                       @if(!empty($files = $tb->files()->get()))
                                           <?php $tab_files = getFiles($files); ?>
                                           @if(is_array($tab_files) and count($tab_files)>0)
                                               @if(array_key_exists('audio', $tab_files))
                                                    @include('Front/page_parts/audio', ['audio' => $tab_files['audio']])
                                               @endif
                                               @if(array_key_exists('link', $tab_files))
                                                   @include('Front/page_parts/link', ['links' => $tab_files['link']])
                                               @endif
                                               @if(array_key_exists('image', $tab_files))
                                                   @include('Front/page_parts/item', ['hover_img' => 'frontend/img/add-plus.png','images' => $tab_files['image']])
                                               @endif
                                           @endif
                                       @endif
                                       </div>
                                   </div>
                               </div>
                             @endforeach
                            @endif
                        </div>
                        @endfor
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@stop
@section('script')
<script src="{{ asset('frontend/js/audioplayer.min.js') }}"></script>
@stop