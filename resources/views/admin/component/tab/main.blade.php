@extends('admin.master')

@section('content') {{-- master @yield(content)--}}
<div class="panel panel-default">
    <div class="panel-heading">
        {{trans('admin.tabs')}}
    </div>
    <div class="panel-body">
        <div class="panel-row">
            <a href="{{ action('Admin\TabsController@index') }}"><h3 class="text-left">{{ trans('admin.tabs') }}</h3></a>
            <hr>
        </div>
        <div class="panel-row">
            <a href="{{ action('Admin\TabsDataController@index') }}"><h3 class="text-left">{{ trans('admin.tabs-data') }}</h3></a>
            <hr>
        </div>
    </div>
</div>
@include('admin.modals.remove',['item'=>trans('admin.user_sure')])
@stop