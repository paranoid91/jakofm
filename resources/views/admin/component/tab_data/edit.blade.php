@extends('admin.master')

@section('content')
    <h3>{{trans('admin.edit_tab-data')}} : {{$tab_data->id}}</h3>

    <hr>
    <!-- AJAX REQUEST MESSAGE PLACE -->
    <div class="message_place"></div>
    {!! Form::model($tab_data,['method'=>'PATCH','action'=>['Admin\TabsDataController@update',$tab_data], 'files'=> true]) !!}

            <!-- TRANSLATE -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <a href="{{action('Admin\TabsDataController@translate',[$tab_data->id])}}" class="btn btn-default">{{trans('admin.translate')}}</a>
            </div>
        </div>
    </div>
    <!-- END TRANSLATE -->
    @include('admin.component.tab_data.form',[
           'lang_id'=>$tab_data->lang_id,
           'lang'=>$tab_data->lang,
           'slug'=>$tab_data->slug,
           'news_image'=>(count(get_poster($tab_data->files,300)) > 0) ? '<img src="'.asset(get_poster($tab_data->files,300)['path']).'" width="100%"/>' : '',
           'news_image_url' => (count(get_poster($tab_data->files,0)) > 0) ? get_poster($tab_data->files,0)['path'] : '',
           'images' => $tab_data->files()->where('type','image')->get(),
           'audio' => $tab_data->files()->where('type','audio')->get(),
           'video' => $tab_data->files()->where('type','link')->get(),
           ])
    {!! Form::close() !!}
            <!-- AJAX REQUEST MESSAGE PLACE -->
    <div class="message_place"></div>
    @include('errors.list')
@stop