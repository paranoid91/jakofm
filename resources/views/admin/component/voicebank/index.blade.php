@extends('admin.master')

@section('content') {{-- master @yield(content)--}}
<div class="panel panel-default">
    <div class="panel-heading">
        {{trans('admin.voice-bank')}}
    </div>
    <div class="panel-body">
        <div class="panel-row">
            <a href="{{ action('Admin\AuthorsController@index') }}"><h3 class="text-left">{{ trans('admin.authors') }}</h3></a>
            <hr>
        </div>
        {{--<div class="panel-row">
            <a href="{{ action('Admin\AuthorCatController@index') }}"><h3 class="text-left">{{ trans('admin.author-categories') }}</h3></a>
            <hr>
        </div>--}}
        <div class="panel-row">
            <a href="{{ action('Admin\FilesCatController@index') }}"><h3 class="text-left">{{ trans('admin.audio-categories') }}</h3></a>
            <hr>
        </div>
    </div>
</div>
@include('admin.modals.remove',['item'=>trans('admin.user_sure')])
@stop