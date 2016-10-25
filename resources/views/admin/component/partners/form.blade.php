<div class="row">
    <div class="col-sm-6">
        {!! Form::label('title',trans('admin.title')) !!} <i class="required">*</i>
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        {!! Form::label('link',trans('admin.link')) !!}
        {!! Form::text('link',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    @if(isset($img) && isset($img_url))
        <div class="row">
            <div class="col-sm-6 images myItemImages">
                <div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ni_0">
                                <div>{!! $img !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::text('file',$img_url,['class'=>'form-control','id'=>'image']) !!}
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
                {!! Form::text('file',null,['class'=>'form-control','id'=>'image','data-width'=>trans('admin.image_width_error'),'data-height'=>trans('admin.image_height_error')]) !!}
            </div>
            <div class="col-sm-4">
                <a href="{{asset('filemanager/dialog.php?type=1&descending=false&field_id="image')}}" class="fancybox btn btn-primary" onClick="getFieldValue('ni_0','{{asset('/')}}',100);" ><i class="fa fa-image"></i> Select Image *</a>
            </div>
        </div>
    @endif
</div>
<div class="row">
    <div class="col-sm-4">
        {!! Form::submit(trans('admin.submit'),['class'=>'btn btn-success']) !!}
    </div>
</div>