@extends("Front/page_parts/app")

@section("title"){{ 'About Us' }}@stop

@section("content")
    <div class="voice-bank-container">
        @include('Front/page_parts/top-bg', ['img' => asset('frontend/img/Untitleddsdsa-1.jpg'), 'text1' => 'ჩვენი კომპანიის', 'text2' => 'შესახებ', 'class' => 'bg-top'])
        <div class="voice-bank-main" style="background-color: #e6e6e6">
            <div class="voice-bank-tabs services-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">კომპანიის შესახებ</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">ჩვენი სტუდიები</a></li>
                </ul>
                <div style="background-color: #e6e6e6">
                    <div class="tab-content text-left container services-container">
                        <div role="tabpanel" class="services-tab vcb-tab tab-pane fade in active" id="home">
                            <img class="tab-img" src="{{ asset('frontend/img/feather.png') }}"/>&nbsp;&nbsp;
                            <span class="tab-span">რაცხა ტექსი</span>
                            <p class="tab-par">What is Lorem Ipsum?
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                Why do we use it?
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </p>
                        </div>
                        <div role="tabpanel" class="services-tab vcb-tab tab-pane fade" id="profile">
                            <img src="{{ asset('frontend/img/headphone.png') }}"/>&nbsp;&nbsp;
                            <span class="tab-span">ხმის ჩაწერის სტუდია</span>
                            <p class="tab-par">What is Lorem Ipsum?
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                Why do we use it?
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </p>
                            <div class="row service-table-text">
                                <div class="col-sm-4 col-md-2 col-lg-2">Some text</div>
                                <div class="col-sm-8 col-md-10 col-lg-10 serv-tb-txt-r">It is a long established fact that a reader will be distracted by the readable</div>
                                <div class="col-sm-4 col-md-2 col-lg-2">Some text</div>
                                <div class="col-sm-8 col-md-10 col-lg-10 serv-tb-txt-r">It is a long established fact that a reader will be distracted by the readable</div>
                                <div class="col-sm-4 col-md-2 col-lg-2">Some text</div>
                                <div class="col-sm-8 col-md-10 col-lg-10 serv-tb-txt-r">It is a long established fact that a reader will be distracted by the readable</div>
                                <div class="col-sm-4 col-md-2 col-lg-2">Some text</div>
                                <div class="col-sm-8 col-md-10 col-lg-10 serv-tb-txt-r">It is a long established fact that a reader will be distracted by the readable</div>
                            </div>
                            <div class="portfolio-item">
                                @include('Front/page_parts/item', [
                                     'img' => null,
                                     'title' => null,
                                     'text' => null,
                                     'hover_img' => 'frontend/img/add-plus.png',
                                     'images' => [
                                        'frontend/img/Untitlsdsed-1.jpg', 'frontend/img/Untitlesadsadd-1.jpg', 'frontend/img/asdasdasd.jpg', 'frontend/img/Untitled-1.jpg'
                                     ]
                                ])
                            </div>
                            <img src="{{ asset('frontend/img/videocamera.png') }}"/>&nbsp;&nbsp;
                            <span class="tab-span">ვიდეო სტუდია</span>
                            <p class="tab-par">What is Lorem Ipsum?
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                Why do we use it?
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </p>
                            <div class="row service-table-text">
                                <div class="col-sm-4 col-md-2 col-lg-2">Some text</div>
                                <div class="col-sm-8 col-md-10 col-lg-10 serv-tb-txt-r">It is a long established fact that a reader will be distracted by the readable</div>
                                <div class="col-sm-4 col-md-2 col-lg-2">Some text</div>
                                <div class="col-sm-8 col-md-10 col-lg-10 serv-tb-txt-r">It is a long established fact that a reader will be distracted by the readable</div>
                                <div class="col-sm-4 col-md-2 col-lg-2">Some text</div>
                                <div class="col-sm-8 col-md-10 col-lg-10 serv-tb-txt-r">It is a long established fact that a reader will be distracted by the readable</div>
                                <div class="col-sm-4 col-md-2 col-lg-2">Some text</div>
                                <div class="col-sm-8 col-md-10 col-lg-10 serv-tb-txt-r">It is a long established fact that a reader will be distracted by the readable</div>
                            </div>
                            <div class="portfolio-item">
                                @include('Front/page_parts/item', [
                                    'img' => null,
                                     'title' => null,
                                     'text' => null,
                                     'hover_img' => 'frontend/img/add-plus.png',
                                     'images' => [
                                        'frontend/img/Untitlsdsed-1.jpg', 'frontend/img/Untitlesadsadd-1.jpg', 'frontend/img/asdasdasd.jpg', 'frontend/img/Untitled-1.jpg'
                                     ]
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop