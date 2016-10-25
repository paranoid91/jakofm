@extends('admin.master')

@section('content') {{-- master @yield(content)--}}

<div class="panel panel-default">
    <div class="panel-heading">
        {{ trans('admin.tabs') }}
        <a href="{{ action('Admin\TabsController@create') }}" class="btn btn-success right"><i class="fa fa-plus"></i> {{trans('admin.add')}}</a><div class="fix"></div>
    </div>
    <div class="panel-body">
        @if(count($tabs) > 0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>{{trans('admin.title')}}</th>
                    <th>{{trans('admin.lang')}}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tabs as $tab)
                    <tr>
                        <td>{{$tab->id}}</td>
                        <td><a href="{{ action('Admin\TabsController@edit',$tab->id) }}" class="col-lg-11">{{$tab->title}}</a></td>
                        <td>{{get_data_lang($tab->lang)}}</td>
                        <td>
                            <a href="{{ action('Admin\TabsController@edit',$tab->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a class="remove-modal btn btn-danger" data-toggle="modal" data-target="#RemoveModal" data-url="{{ action('Admin\TabsController@destroy',$tab->id) }}" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6" align="center">{!! str_replace('/?', '?', $tabs->render()) !!}</td>
                </tr>
                </tfoot>
            </table>
        @endif
    </div>
</div>

@include('admin.modals.remove',['item'=>trans('admin.sure')])

@stop