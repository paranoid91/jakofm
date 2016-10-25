@extends('admin.master')

@section('content') {{-- master @yield(content)--}}

<h2>{{trans('admin.audio')}}</h2>

{!! Form::model($cat,['method'=>'PATCH', 'action'=>['Admin\FilesCatController@update',$cat->id]]) !!}

@include('admin.component.categories.files.form',['submitButtonText'=>trans('admin.save')])

{!! Form::close() !!}

@include('errors.list')

@stop