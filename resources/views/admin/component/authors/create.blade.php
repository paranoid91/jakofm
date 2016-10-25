@extends('admin.master')

@section('content') {{-- master @yield(content)--}}

<h2>{{trans('admin.authors')}}</h2>

@include('errors.list')

{!! Form::open(['action'=>'Admin\AuthorsController@store', 'files' => true]) !!}

@include('admin.component.authors.form',[
    'submitButtonText'=>trans('admin.add'),
    'lang_id' => '',
    'lang' => '',
    'authors_cat' => null,
    'selected_cats' => null,
    'audio_cats' => $audio_cats,
    'audio_cats_undf' => null,
    'types' => ['artistic','academic','commercial','vocal']
])

{!! Form::close() !!}

<script>
    $(function(){
        var cat = $('.author-cat-list').first();
        $(cat).prop('checked', true);
    });
</script>

@stop