{!! Form::hidden('slug',null) !!}
<div id="upload_popup">
    <div class="percents"></div>
    <div class="progress-line">
        <div></div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">

        {!! Form::label('lang',trans('admin.select_language')) !!} <i class="required"></i>
        {!! Form::select('lang',get_languages($lang_id,$lang,App\Author::select('lang')->where('lang_id',$lang_id)->get()),$lang,['class'=>'chose-lang chosen-select-deselect','tabindex'=>8]) !!}
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
        @if(isset($cats) && count($cats) > 0)
            <label for="select-brand">{{ trans("admin.sel-cat") }}</label>
            <div class="form-group author-cat-list">
                @foreach($cats as $cat)
                    {!! Form::radio('cat[]', $cat->id, checkAuthorCats($cat->id, $selected_cats )) !!} {{ $cat->name }} <br>
                @endforeach
            </div>
            {{--{!! Form::select('cat[1]',[''=>'---']+idAsKey($cats),$authors_cat,['class'=>'chose-lang chosen-select-deselect','id'=>'select-brand','data-placeholder'=>'Select an option']) !!}--}}
        @else
            <div class="alert alert-warning">
                <strong>No Categories Found</strong>
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-5">
        <div class="form-group">
            {!! Form::label('name',trans('admin.name')) !!}
            <i class="required">*</i>
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>
@if(isset($img) && isset($img_url))
<div class="row">
    <div class="col-sm-6 images myItemImages">
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="ni_0">
                        <div>
                            {!! $img !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::text('image[0]',$img_url,['class'=>'form-control','id'=>'image']) !!}
                </div>
                <div class="col-sm-6">
                    <a href="{{asset('filemanager/dialog.php?type=1&descending=false&field_id=image')}}" class="fancybox btn btn-primary" onClick="getFieldValue('ni_0','{{asset('/')}}',100);" ><i class="fa fa-image"></i> Select Image *</a>
                </div>

            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-sm-4">
        {!! Form::text('img[]',null,['class'=>'form-control','id'=>'image','data-width'=>trans('admin.image_width_error'),'data-height'=>trans('admin.image_height_error')]) !!}
    </div>
    <div class="col-sm-4">
        <a href="{{asset('filemanager/dialog.php?type=1&descending=false&field_id="image')}}" class="fancybox btn btn-primary" onClick="getFieldValue('ni_0','{{asset('/')}}',100);" ><i class="fa fa-image"></i> Select Image *</a>
    </div>
</div>
@endif

@if(count($audio_cats) > 0)
<div class="row">
    <br>
    <div class="col-sm-6">
        <h3><span class="glyphicon glyphicon-music"></span>&nbsp;&nbsp;Add Audio Files</h3>
        @foreach($audio_cats as $audio)
        <div class="row audio-option-item">
            {!! Form::select('cat[1]',[$audio->name],$audio->name,[
                            'class'=>'chose-lang chosen-select-deselect',
                            'id'=>'select-cat','data-placeholder'=>'Select an option',
                            'disabled' => 'disabled',
                            'data-audio-lang' => $audio->name
            ]) !!}
        </div>
        <div class="row">
        @if(isset($audio_files) and count($audio_files)>0)
            @foreach($audio_files as $file)
                @if(in_array($file->audio_type, $types) and $audio->id == $file->cat_id)
                    <?php $types = audioTypesList($file, $types); ?>
                @endif
            @endforeach
            @foreach($types as $item)
               @if(is_array($item))
                   @if($item['cat_id'] == $audio->id)
                       <h4>{{ trans('admin.'.$item['audio_type']) }}: </h4>
                       <h4>
                           {{ $item['name'].'.mp3' }} &nbsp;&nbsp;&nbsp;
                           <a class="remove-modal btn btn-danger remove-data" data-toggle="modal" data-target="#RemoveModal" data-url="{{ action('Admin\AuthorsController@removeAudio', $item['id']) }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                       </h4>
                   @endif
               @else
                  <h4>{{ trans('admin.'.$item) }}: </h4>{!! Form::file('audio['.$audio->id.']['.$item.']', ['class' => 'author-file']) !!}<br>
               @endif
            @endforeach
        @else
            @foreach($types as $item)
                <h4>{{ trans('admin.'.$item) }}: </h4>{!! Form::file('audio['.$audio->id.']['.$item.']', ['class' => 'author-file']) !!}<br>
            @endforeach
        @endif
        </div>
        <?php $types = resetTypes(); ?>
        @endforeach
    </div>
</div>
@endif
<hr>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::submit($submitButtonText,['class' => 'btn btn-primary author-submit']) !!}
        </div>
    </div>
</div>