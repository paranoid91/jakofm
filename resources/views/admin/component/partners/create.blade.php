@extends('admin.master')

@section('content')
    <h3>{{trans('admin.add_partner')}}</h3>
    <hr>
    <!-- AJAX REQUEST MESSAGE PLACE -->
    <div class="message_place"></div>

    {!! Form::open(['method'=>'POST','action'=>'Admin\PartnersController@store','class'=>'myForm']) !!}

    @include('admin.component.partners.form',[
               'lang_id' => '',
               'lang' => '',
               'img'=>'',
               'img_url'=>'',
               ])

    {!! Form::close() !!}

            <!-- AJAX REQUEST MESSAGE PLACE -->
    <div class="message_place"></div>
    @include('errors.list')
@stop