
@extends('admin.default')

@section('page-header')
Category <small>{{ trans('app.item_detall') }}</small>
@endsection

@section('content')

<div class="mB-20">
    <ul class="list-inline">

        @can('category.index')
        <li class="list-inline-item">
            <a href="{{ route('category.index') }}" class="btn btn-warning btn-sm" title="{{ trans('app.view_button') }}">
                <span class="ti-arrow-left"></span> 
            </a>
        </li>
        @endcan

        @can('category.edit')
        <li class="list-inline-item">
            <a href="{{ route('category.edit', $category->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a>
        </li>
        @endcan
        
        @can('category.delete')
        <li class="list-inline-item">
            {!! Form::open([
                'class'=>'delete',
                'url'  => route('category.destroy', $category->id), 
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
            <th>ID</th><td>{{ $category->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $category->name }} </td></tr><tr><th> Detall </th><td> {{ $category->detall }} </td></tr><tr><th> Active </th><td> {{ $category->active }} </td></tr>
        </tbody>
    </table>
</div>


@endsection






