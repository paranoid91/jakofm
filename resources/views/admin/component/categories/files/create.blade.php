@extends('admin.master')

@section('content') {{-- master @yield(content)--}}

<h2>{{trans('admin.files-categories')}}</h2>

{!! Form::open(['action'=>'Admin\FilesCatController@store']) !!}

@include('admin.component.categories.files.form',['submitButtonText'=>trans('admin.add')])

{!! Form::close() !!}

@include('errors.list')

@stop