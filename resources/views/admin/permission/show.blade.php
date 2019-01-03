
@extends('admin.default')

@section('page-header')
Permission <small>{{ trans('app.item_detall') }}</small>
@endsection

@section('content')

<div class="mB-20">
    <ul class="list-inline">
    @can('permissions.index')
        <li class="list-inline-item">
            <a href="{{ route('permissions.index') }}" class="btn btn-warning btn-sm" title="{{ trans('app.back_button') }}">
                <span class="ti-arrow-left"></span> 
            </a>
        </li>
        @endcan
        @can('permissions.edit')
        <li class="list-inline-item">
            <a href="{{ route('permissions.edit', $permission->id,'.edit') }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a>
        </li>
        @endcan
        @can('permissions.delete')
        <li class="list-inline-item">
            {!! Form::open([
                'class'=>'delete',
                'url'  => route('permissions.destroy', $permission->id), 
                'method' => 'DELETE',
            ]) 
            !!}

            <button class="btn btn-danger btn-sm" title="{{ trans('app.delete_title') }}"><i class="ti-trash"></i></button>

            {!! Form::close() !!}
        </li>
        @endcan
    </ul>
</div>



<br/>
<br/>

<div class="bgc-white bd bdrs-3 p-20 mB-20 table-responsive">
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <tbody>
            <th>ID</th><td>{{ $permission->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $permission->name }} </td></tr><tr><th> Slug </th><td> {{ $permission->slug }} </td></tr><tr><th> Description </th><td> {{ $permission->description }} </td></tr>
        </tbody>
    </table>
</div>


@endsection






