@extends('admin.master')

@section('content') {{-- master @yield(content)--}}

<h2>{{trans('admin.author-categories')}}</h2>

{!! Form::open(['action'=>'Admin\AuthorCatController@store']) !!}

@include('admin.component.categories.authors.form',['submitButtonText'=>trans('admin.add')])

{!! Form::close() !!}

@include('errors.list')

@stop