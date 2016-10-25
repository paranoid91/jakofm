<!-- HIDDEN PRODUCTS CAT -->
{!! Form::hidden('cat',1) !!}
{!! Form::hidden('slug',$slug) !!}

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('lang',trans('admin.select_language')) !!} <i class="required"></i>
        {!! Form::select('lang',get_languages($lang_id,$lang,\App\TabData::select('lang')->where('lang_id',$lang_id)->get()),$lang,['class'=>'chose-lang chosen-select-deselect','tabindex'=>8]) !!}
        <script>
            $(function(){
                $('.chose-lang').chosen({
                    allow_single_deselect: true,
                    scroll_on_hover: false
                });
            });
        </script>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
@if(count($tabs) > 0)
    <label for="select-brand">{{ trans("admin.parent-tab") }}</label>
    <i class="required">*</i>
    {!! Form::select('tab_id', printOptions($tabs, true),(isset($tab)) ? $tab->page_id : null, ['class'=>'chose-lang chosen-select-deselect','id'=>'select-brand','data-placeholder'=>'Select an option']) !!}
@else
    <div class="alert alert-warning">
        <strong>No Tabs Found</strong>
    </div>
@endif
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        {!! Form::label('title',trans('admin.title')) !!}
        <i class="required">*</i>
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-lg-10">Icon: </div>
    <div class="col-sm-4">
        {!! Form::text('icon',null,['class'=>'form-control','id'=>'image','data-width'=>trans('admin.image_width_error'),'data-height'=>trans('admin.image_height_error')]) !!}
    </div>
    <div class="col-sm-4">
        <a href="{{asset('filemanager/dialog.php?type=1&descending=false&field_id="image')}}" class="fancybox btn btn-primary" onClick="getFieldValue('ni_1000','{{asset('/')}}',100);" ><i class="fa fa-image"></i> Select Image *</a>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        {!! Form::label('text',trans('admin.text')) !!}
        {!! Form::textarea('text',null,['class'=>'form-control tinymce']) !!}
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12">
        <h3>Add files</h3>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 images myItemImages">
        <h4>Add Images</h4>
        @if(isset($images))
            @foreach($images as $key=>$img)
                <div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ni_{{$key}}">
                                <div>
                                    <img src="{{asset($img->path)}}" width="100%"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::text('image['.$key.']',$img->path,['class'=>'form-control','id'=>'ni_'.$key]) !!}
                        </div>
                        <div class="col-sm-6">
                            <a href="{{asset('filemanager/dialog.php?type=1&descending=false&field_id=ni_'.$key.'')}}" class="fancybox btn btn-primary" onClick="getFieldValue('ni_{{$key}}','{{asset('/')}}',100);" ><i class="fa fa-image"></i> Select Image *</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ni_0">
                            <div>
                                {!! $news_image !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::text('image[]',$news_image_url,['class'=>'form-control','id'=>'ni_0']) !!}
                    </div>
                    <div class="col-sm-6">
                        <a href="{{asset('filemanager/dialog.php?type=1&descending=false&field_id=ni_0')}}" class="fancybox btn btn-primary" onClick="getFieldValue('ni_0','{{asset('/')}}',100);" ><i class="fa fa-image"></i> Select Image *</a>
                    </div>

                </div>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-3">
        {!! Form::button('<i class="fa fa-plus"></i> მეტი',['class'=>'btn btn-primary','id'=>'add_more']) !!}
    </div>
    <div class="col-sm-3">
        {!! Form::button('<i class="fa fa-minus"></i> ბოლოს წაშლა',['class'=>'btn btn-danger','id'=>'del_image']) !!}
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6">
        <h4>Add Audio</h4>
        @for($i=0; $i<4; $i++)
            @if(isset($audio) && count($audio)>0)
                @if(isset($audio[$i]))
                    <h4>
                        {{ $audio[$i]->title.'.mp3' }} &nbsp;&nbsp;&nbsp;
                        <a class="remove-modal btn btn-danger remove-data" data-toggle="modal" data-target="#RemoveModal" data-url="{{ action('Admin\TabsDataController@removeAudio', $audio[$i]->id) }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </h4>
                @else
                {!! Form::file('audio[]', ['class'=>'author-file']) !!}
                <br>
                @endif
            @else
            {!! Form::file('audio[]', ['class'=>'author-file']) !!}
            <br>
            @endif
        @endfor
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6">
        <h4>Add Youtube Link</h4>
        @for($i=0; $i<4; $i++)
            @if(isset($video) && count($video)>0)
                @if(isset($video[$i]))
                    {!! Form::text('video[]',"https://www.youtube.com/watch?v=".$video[$i]->path,['class'=>'form-control']) !!}
                    <br>
                @else
                    {!! Form::text('video[]',null,['class'=>'form-control']) !!}
                    <br>
                @endif
            @else
            {!! Form::text('video[]',null,['class'=>'form-control']) !!}
            <br>
            @endif
        @endfor
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        {!! Form::submit(trans('admin.submit'),['class'=>'btn btn-success']) !!}
    </div>
</div>

<script>
    $(function(){
        var html = '<div><div class="row"><div class="col-sm-12"> <div class="ni_"><div></div></div></div></div><div class="row">' +
                '<div class="col-sm-6">'+
                '{!! Form::text('image[]',null,['class'=>'form-control','id'=>'ni_']) !!}</div>'+
                '<div class="col-sm-6">'+
                '<a href="{{asset('filemanager/dialog.php?type=1&descending=false&field_id=ni_')}}" class="fancybox btn btn-primary" onClick="getFieldValue(\'ni_\',\'{{asset('/')}}\',100);" ><i class="fa fa-image"></i> Select Image *</a></div></div></div>';
        $('#add_more').Fields(html,{appendClass:'images',del:'del_image',chosen_prefix:'ni_'});

    });
</script>