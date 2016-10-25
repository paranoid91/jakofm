@extends('admin.master')

@section('content')
    <h3>{{trans('admin.add_tab_data')}}</h3>
    <hr>
        <!-- AJAX REQUEST MESSAGE PLACE -->
<div class="message_place"></div>

{!! Form::open(['method'=>'POST','action'=>'Admin\TabsDataController@store', 'files'=> true]) !!}

@include('admin.component.tab_data.form',[
           'lang_id' => '',
           'lang' => '',
           'slug' => '',
           'news_image'=>'',
           'news_image_url'=>'',
           ])

{!! Form::close() !!}
        <!-- AJAX REQUEST MESSAGE PLACE -->
<div class="message_place"></div>
@include('errors.list')
@stop