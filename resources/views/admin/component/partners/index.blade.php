@extends('admin.master')

@section('content') {{-- master @yield(content)--}}

<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('admin.partners') }}
        <a href="{{ action('Admin\PartnersController@create') }}" class="btn btn-success right"><i class="fa fa-plus"></i> {{trans('admin.add')}}</a><div class="fix"></div>
    </div>
    <div class="panel-body">
        @if(count($partners) > 0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>{{trans('admin.img')}}</th>
                    <th>{{trans('admin.title')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($partners as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td class="thumb_100"><img src="{{ $item->file }}" width="100"/></td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <a href="{{ action('Admin\PartnersController@edit',$item->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a class="remove-modal btn btn-danger" data-toggle="modal" data-target="#RemoveModal" data-url="{{ action('Admin\PartnersController@destroy',$item->id) }}" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="7" align="center">{!! str_replace('/?', '?', $partners->render()) !!}</td>
                </tr>
                </tfoot>
            </table>
        @endif
    </div>
</div>

@include('admin.modals.remove',['item'=>trans('admin.sure')])

@stop