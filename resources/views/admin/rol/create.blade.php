@extends('admin.default')

@section('page-header')
    Rol <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')


<ul class="list-inline">
        <li class="list-inline-item">
    <a href="{{ route('roles.index') }}" class="btn btn-warning btn-sm" title="{{ trans('app.view_button') }}">
        <span class="ti-arrow-left"></span> 
    </a>
</li>
</ul>

    {!! Form::open([
            'action' => ['Admin\RolController@store'],
            'files' => true
        ])
    !!}

        @include ('admin.rol.form', ['formMode' => trans('app.add_new_item')])
        
    {!! Form::close() !!}
    
@stop



