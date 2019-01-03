
@extends('admin.default')

@section('page-header')
Rol <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

<div class="mB-20">


    @can('roles.create')
    <a href="{{ route('roles.create') }}" class="btn cur-p btn-outline-success btn-sm" title="{{ trans('app.add_button') }}"><span class="ti-plus"></span> </a>
    @endcan

    @can('roles.index')    
    <a href="{{ route('roles.index') }}" class="btn cur-p btn-outline-primary btn-sm" title="{{ trans('app.list_button') }}"><span class="ti-list"></span> </a>
    @endcan

    @can('users.index')
    <a href="{{ route('users.index') }}" title="{{ trans('app.users_title') }}" class="btn cur-p btn-outline-primary btn-sm"><span class="ti-user"></span></a>
    @endcan

    @can('roles.index')
    <a href="{{ route('roles.index') }}" title="{{ trans('app.roles_title') }}" class="btn btn-info btn-sm"><span class="ti-key"></span></a>
    @endcan

    @can('permissions.index')
    <a href="{{ route('permissions.index') }}" title="{{ trans('app.permissions_title') }}" class="btn cur-p btn-outline-primary btn-sm"><span class="ti-check-box"></span></a>
    @endcan

    @can('roles.index')    
    <form method="GET" action="{{ route('roles.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="{{ trans('app.search') }}..." value="{{ request('search') }}">
            <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    @endcan
    
</div>



<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
             <th>#</th><th>Name</th><th>Slug</th><th>Description</th><th>Actions</th>
         </tr>
     </thead>

     <tfoot>
        <tr>
         <th>#</th><th>Name</th><th>Slug</th><th>Description</th><th>Actions</th>
     </tr>
 </tfoot>

 <tbody>
    @foreach ($role as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->name }}</td><td>{{ $item->slug }}</td><td>{{ $item->description }}</td>
        <td>
            <ul class="list-inline">
                @can('roles.show') 
                <li class="list-inline-item">
                    <a href="{{ route('roles.show', $item->id) }}" title="{{ trans('app.view_button') }}" class="btn btn-info btn-sm"><span class="ti-eye"></span></a>
                </li>
                @endcan
                @can('roles.edit') 
                <li class="list-inline-item">
                    <a href="{{ route('roles.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a>
                </li>
                @endcan
                @can('roles.delete') 
                <li class="list-inline-item">
                    {!! Form::open([
                        'class'=>'delete',
                        'url'  => route('roles.destroy', $item->id), 
                        'method' => 'DELETE',
                    ]) 
                    !!}

                    <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>

                    {!! Form::close() !!}
                </li>
                @endcan
            </ul>
        </td>
    </tr>
    @endforeach
</tbody>

</table>
<div class="pagination-wrapper"> {!! $role->appends(['search' => Request::get('search')])->render() !!} </div>
</div>


@endsection




