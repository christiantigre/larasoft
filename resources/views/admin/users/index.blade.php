@extends('admin.default')

@section('page-header')
Users <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')


    

<div class="mB-20">
    @can('users.create')
    <a href="{{ route('users.create') }}" class="btn cur-p btn-outline-success btn-sm" title="{{ trans('app.add_button') }}"><span class="ti-plus"></span> </a>
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


<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th> 
            </tr>
        </thead>
        
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th> 
            </tr>
        </tfoot>
        
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>
                   
                    <a href="{{ route('users.edit', $item->id) }}">{{ $item->name }}</a>
                    
                </td>
                <td>{{ $item->email }}</td>
                <td>
                    <ul class="list-inline">
                        @can('users.show') 
                        <li class="list-inline-item">
                            <a href="{{ route('users.show', $item->id) }}" title="{{ trans('app.view_button') }}" class="btn btn-info btn-sm"><span class="ti-eye"></span></a>
                        </li>
                        @endcan
                        <li class="list-inline-item">
                            @can('users.edit')
                            <a href="{{ route('users.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a>
                            @endcan
                        </li>
                        <li class="list-inline-item">
                            @can('users.delete')                                    
                            {!! Form::open([
                                'class'=>'delete',
                                'url'  => route('users.destroy', $item->id), 
                                'method' => 'DELETE',
                            ]) 
                            !!}

                            <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>
                            
                            {!! Form::close() !!}
                            @endcan
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

@endsection