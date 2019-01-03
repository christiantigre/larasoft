
@extends('admin.default')

@section('page-header')
    Rol <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')

<ul class="list-inline">
        <li class="list-inline-item">
    <a href="{{ route('roles.index') }}" class="btn btn-warning btn-sm" title="{{ trans('app.view_button') }}">
        <span class="ti-arrow-left"></span> 
    </a>
</li>
</ul>

    {!! Form::model($role, [
            'action' => ['Admin\RolController@update', $role->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    @include ('admin.rol.form', ['formMode' => trans('app.update_item') ])

        
    {!! Form::close() !!}
    
@stop


