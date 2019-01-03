@extends('admin.default')

@section('page-header')
    Permission <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')


<ul class="list-inline">
    @can('permissions.index')
        <li class="list-inline-item">
    <a href="{{ route('permissions.index') }}" class="btn btn-warning btn-sm" title="{{ trans('app.back_button') }}">
        <span class="ti-arrow-left"></span> 
    </a>
</li>
@endcan
</ul>

    {!! Form::open([
            'action' => ['Admin\PermissionController@store'],
            'files' => true
        ])
    !!}

        @include ('admin.permission.form', ['formMode' => 'Save'])
        
    {!! Form::close() !!}
    
@stop



