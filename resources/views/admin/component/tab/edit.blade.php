@extends('admin.master')

@section('content')
    <h3>{{trans('admin.edit_page')}} : {{$tab->id}}</h3>

    <hr>
    <!-- AJAX REQUEST MESSAGE PLACE -->
    <div class="message_place"></div>
    {!! Form::model($tab,['method'=>'PATCH','action'=>['Admin\TabsController@update',$tab]]) !!}

            <!-- TRANSLATE -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <a href="{{action('Admin\TabsController@translate',[$tab->id])}}" class="btn btn-default">{{trans('admin.translate')}}</a>
            </div>
        </div>
    </div>
    <!-- END TRANSLATE -->
    @include('admin.component.tab.form',[
           'lang_id'=>$tab->lang_id,
           'lang'=>$tab->lang,
           'slug'=>$tab->slug
           ])

    {!! Form::close() !!}
            <!-- AJAX REQUEST MESSAGE PLACE -->
    <div class="message_place"></div>
    @include('errors.list')
@stop