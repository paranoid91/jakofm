@extends('admin.master')

@section('content') {{-- master @yield(content)--}}

<h2>{{trans('admin.authors')}}</h2>

@include('errors.list')

{!! Form::model($author,['method'=>'PATCH', 'action'=>['Admin\AuthorsController@update',$author->id],'files' => true]) !!}

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <a href="{{action('Admin\AuthorsController@translate',[$author->id])}}" class="btn btn-default">{{trans('admin.translate')}}</a>
        </div>
    </div>
</div>

@include('admin.component.authors.form',[
   'submitButtonText'=>trans('admin.save'),
   'lang_id'=>$author->lang_id,
   'lang'=>$author->lang,
   'selected_cats'=>get_cat($author->categories->toArray(),false),
   'img'=>(count(get_poster($author->files,300)) > 0) ? '<img src="'.asset(get_poster($author->files,300)['path']).'" width="100%"/>' : '',
   'img_url' => (count(get_poster($author->files,0)) > 0) ? get_poster($author->files,0)['path'] : '',
   'audio_files' => $author->audio()->get(),
   'types' => ['artistic','academic','commercial','vocal']
])

{!! Form::close() !!}

@stop