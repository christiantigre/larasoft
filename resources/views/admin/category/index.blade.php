
@extends('admin.default')

@section('page-header')
    Category <small>{{ trans('app.manage') }}</small>
@endsection

@section('content')

<div class="mB-20">

    @can('category.create')
    <a href="{{ route('category.create') }}" class="btn btn-info btn-sm" title="{{ trans('app.view_button') }}">
        <span class="ti-plus"></span> 
    </a>
    @endcan    

    @can('category.index')
    <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm" title="{{ trans('app.list_button') }}">
        <span class="ti-list"></span> 
    </a>
    @endcan

    @can('category.index')
    <form method="GET" action="{{ route('category.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                   <th>#</th><th>Name</th><th>Detall</th><th>Active</th><th>Actions</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                   <th>#</th><th>Name</th><th>Detall</th><th>Active</th><th>Actions</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td><td>{{ $item->detall }}</td><td>{{ $item->active }}</td>
                        <td>
                            <ul class="list-inline">

                                @can('category.show')
                                <li class="list-inline-item">
                                    <a href="{{ route('category.show', $item->id) }}" title="{{ trans('app.view_button') }}" class="btn btn-info btn-sm"><span class="ti-eye"></span></a>
                                </li>
                                @endcan

                                @can('category.edit')
                                <li class="list-inline-item">
                                    <a href="{{ route('category.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a>
                                </li>
                                @endcan

                                @can('category.delete')
                                <li class="list-inline-item">
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route('category.destroy', $item->id), 
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
        
    </div>

    
@endsection




