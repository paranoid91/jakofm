<!-- HIDDEN PRODUCTS CAT -->
{!! Form::hidden('cat',1) !!}
{!! Form::hidden('slug',$slug) !!}

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('lang',trans('admin.select_language')) !!} <i class="required"></i>
        {!! Form::select('lang',get_languages($lang_id,$lang,App\Page::select('lang')->where('lang_id',$lang_id)->get()),$lang,['class'=>'chose-lang chosen-select-deselect','tabindex'=>8]) !!}
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
    <div class="col-sm-8">
        {!! Form::label('title',trans('admin.title')) !!}
        <i class="required">*</i>
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        {!! Form::label('page_name',trans('admin.page_name')) !!}
        <i class="required">*</i> (<b>Same As Title. Must Be In English!</b>)
        {!! Form::text('page_name',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        {!! Form::label('headline_1',trans('admin.page_headline')) !!} 1
        {!! Form::text('headline_1',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        {!! Form::label('headline_2',trans('admin.page_headline')) !!} 2
        {!! Form::text('headline_2',null,['class'=>'form-control']) !!}
    </div>
</div>

{{--
<div class="row">
    <div class="col-sm-8">
        {!! Form::label('text',trans('admin.text')) !!}
        {!! Form::textarea('text',null,['class'=>'form-control tinymce']) !!}
    </div>
</div>
--}}

<div class="row">
    <div class="col-sm-6">
        <div>Background Image <i class="required" style="display: inline">*</i></div>
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
                        {!! Form::text('img',$img_url,['class'=>'form-control','id'=>'image']) !!}
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
            {!! Form::text('img',null,['class'=>'form-control','id'=>'image','data-width'=>trans('admin.image_width_error'),'data-height'=>trans('admin.image_height_error')]) !!}
        </div>
        <div class="col-sm-4">
            <a href="{{asset('filemanager/dialog.php?type=1&descending=false&field_id="image')}}" class="fancybox btn btn-primary" onClick="getFieldValue('ni_0','{{asset('/')}}',100);" ><i class="fa fa-image"></i> Select Image *</a>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-sm-4">
        {!! Form::submit(trans('admin.submit'),['class'=>'btn btn-success']) !!}
    </div>
</div>