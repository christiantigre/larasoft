@extends('admin.default')

@section('page-header')
	User <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')

<div class="mB-20">
    @can('users.create')
    <a href="{{ route('users.create') }}" class="btn cur-p btn-outline-success btn-sm"><span class="ti-plus"></span> </a>
    @endcan

    @can('roles.index')    
    <a href="{{ route('users.index') }}" class="btn cur-p btn-outline-primary btn-sm" title="{{ trans('app.list_button') }}"><span class="ti-list"></span> </a>
    @endcan

    @can('users.index')
    <a href="{{ route('users.index') }}" title="{{ trans('app.users_title') }}" class="btn btn-info btn-sm"><span class="ti-user"></span></a>
    @endcan

    @can('roles.index')
    <a href="{{ route('roles.index') }}" title="{{ trans('app.roles_title') }}" class="btn cur-p btn-outline-primary btn-sm"><span class="ti-key"></span></a>
    @endcan

    @can('permissions.index')
    <a href="{{ route('permissions.index') }}" title="{{ trans('app.permissions_title') }}" class="btn cur-p btn-outline-primary btn-sm"><span class="ti-check-box"></span></a>
    @endcan
</div>

	{!! Form::open([
			'action' => ['UserController@store'],
			'files' => true
		])
	!!}

		@include('admin.users.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>
		
	{!! Form::close() !!}
	
@stop
