<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        @for($i = 1; $i < count($slider); $i++)
            <li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>
        @endfor
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @for($i = 0; $i < count($slider); $i++)
        <div class="item @if($i==0) {{ 'active' }} @endif">
            <img src="{{ asset($slider[$i]->poster) }}" alt="{{ $slider[$i]->title }}" class="img-responsive main-carousel-img" />
            <div class="crsl-item-text animated fadeIn">
                <div>
                    <span class="mdash">&mdash;&mdash;</span>
                    <span class="nbsp">&nbsp;&nbsp;</span>
                    <span class="crl-itm-title">{{ $slider[$i]->title }}</span>
                    <span class="nbsp">&nbsp;&nbsp;</span>
                    <span class="mdash">&mdash;&mdash;</span>
                </div>
                <p class="text-align">{{ $slider[$i]->sub_title }}</p>
                <div class="main-button">
                    <a href="#">{{ trans('front.see-detailed') }}</a>
                </div>
            </div>
        </div>
        @endfor
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-menu-left main-carsl-cont" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-menu-right main-carsl-cont" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>