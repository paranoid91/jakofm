@extends('admin.master')

@section('content')
    <h3>{{trans('admin.add_page')}}</h3>
    <hr>
        <!-- AJAX REQUEST MESSAGE PLACE -->
<div class="message_place"></div>

{!! Form::open(['method'=>'POST','action'=>'Admin\TabsController@store']) !!}

@include('admin.component.tab.form',[
           'lang_id' => '',
           'lang' => '',
           'slug' => '',
           'brand_cat'=>null,
           ])

{!! Form::close() !!}
        <!-- AJAX REQUEST MESSAGE PLACE -->
<div class="message_place"></div>
@include('errors.list')
@stop