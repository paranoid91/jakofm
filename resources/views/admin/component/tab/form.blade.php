<!-- HIDDEN PRODUCTS CAT -->
{!! Form::hidden('cat',1) !!}
{!! Form::hidden('slug',$slug) !!}

<div class="row">
    <div class="col-sm-4">
        {!! Form::label('lang',trans('admin.select_language')) !!} <i class="required"></i>
        {!! Form::select('lang',get_languages($lang_id,$lang,App\Tab::select('lang')->where('lang_id',$lang_id)->get()),$lang,['class'=>'chose-lang chosen-select-deselect','tabindex'=>8]) !!}
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
@if(count($pages) > 0)
    <label for="select-brand">{{ trans("admin.parent-page") }}</label>
    <i class="required">*</i>
    {!! Form::select('page_id', printOptions($pages),(isset($tab)) ? $tab->page_id : null, ['class'=>'chose-lang chosen-select-deselect','id'=>'select-brand','data-placeholder'=>'Select an option']) !!}
@else
    <div class="alert alert-warning">
        <strong>No Pages Found</strong>
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
    <div class="col-sm-8">
        {!! Form::label('tab_name',trans('admin.tab_name')) !!}
        <i class="required">*</i> (<b>Same As Title. Must Be In English!</b>)
        {!! Form::text('tab_name',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        {!! Form::submit(trans('admin.submit'),['class'=>'btn btn-success']) !!}
    </div>
</div>