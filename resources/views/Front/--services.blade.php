@extends("Front/page_parts/app")

@section("title"){{ 'Services' }}@stop

@section("content")
<div class="voice-bank-container">
    @include('Front/page_parts/top-bg', ['img' => asset('frontend/img/music-sdfound-74769.jpg'), 'text1' => 'აუდიო', 'text2' => 'პროდუქცია', 'class' => 'bg-bottom'])
    <div class="voice-bank-main" style="background-color: #e6e6e6">
        <div class="voice-bank-tabs services-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">აუდიო პროდუქცია</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">ვიდეო პროდუქცია</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">ფოტო პროდუქცია</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">ღონისძიებების მენეჯმენტი</a></li>
            </ul>
            <div style="background-color: #e6e6e6">
                <div class="tab-content text-left container services-container">
                    <div role="tabpanel" class="services-tab vcb-tab tab-pane fade in active" id="home">
                        <img class="tab-img" src="{{ asset('frontend/img/headphone.png') }}"/>&nbsp;&nbsp;
                        <span class="tab-span">აუდიო პროდუქცია</span>
                        <p class="tab-par">What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            Why do we use it?
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
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
                    <div role="tabpanel" class="services-tab vcb-tab tab-pane fade" id="profile">
                        <img class="tab-img" src="{{ asset('frontend/img/videocamera.png') }}"/>&nbsp;&nbsp;
                        <span class="tab-span">ვიდეო პროდუქცია</span>
                        <p class="tab-par">What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            Why do we use it?
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
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
                    <div role="tabpanel" class="services-tab vcb-tab tab-pane fade" id="messages">
                        <img class="tab-img" src="{{ asset('frontend/img/photocamera.png') }}"/>&nbsp;&nbsp;
                        <span class="tab-span">ფოტო პროდუქცია</span>
                        <p class="tab-par">What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            Why do we use it?
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
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
                    <div role="tabpanel" class="services-tab vcb-tab tab-pane fade" id="settings">
                        <img class="tab-img" src="{{ asset('frontend/img/people.png') }}"/>&nbsp;&nbsp;
                        <span class="tab-span">ღონისძიებების მენეჯმენტი</span>
                        <p class="tab-par">What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            Why do we use it?
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
                        <div class="portfolio-item changable-img">
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