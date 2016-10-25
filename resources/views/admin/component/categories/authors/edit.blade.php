@extends('admin.master')

@section('content') {{-- master @yield(content)--}}

<h2>{{trans('admin.authors')}}</h2>

{!! Form::model($cat,['method'=>'PATCH', 'action'=>['Admin\AuthorCatController@update',$cat->id]]) !!}

@include('admin.component.categories.authors.form',['submitButtonText'=>trans('admin.save')])

{!! Form::close() !!}

@include('errors.list')

@stop