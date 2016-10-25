@extends('admin.master')

@section('content')
    <h3>{{trans('admin.edit_partner')}} : {{$partner->id}}</h3>
    <hr>
    <!-- AJAX REQUEST MESSAGE PLACE -->
    <div class="message_place"></div>
    {!! Form::model($partner,['method'=>'PATCH','action'=>['Admin\PartnersController@update',$partner],'class'=>'myForm']) !!}

    @include('admin.component.partners.form',[
               'img'=>(!empty($partner->file)) ? '<img src="'.asset($partner->file).'"/>' : '',
               'img_url' => (!empty($partner->file)) ? $partner->file : '',
           ])

    {!! Form::close() !!}

            <!-- AJAX REQUEST MESSAGE PLACE -->
    <div class="message_place"></div>
    @include('errors.list')
@stop