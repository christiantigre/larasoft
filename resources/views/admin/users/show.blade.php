
@extends('admin.default')

@section('page-header')
User <small>{{ trans('app.item_detall') }}</small>
@endsection

@section('content')

<div class="mB-20">
    <ul class="list-inline">
    @can('users.index')
        <li class="list-inline-item">
            <a href="{{ route('users.index') }}" class="btn btn-warning btn-sm" title="{{ trans('app.back_button') }}">
                <span class="ti-arrow-left"></span> 
            </a>
        </li>
        @endcan
        @can('users.edit')
        <li class="list-inline-item">
            <a href="{{ route('users.edit', $item->id,'.edit') }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-sm"><span class="ti-pencil"></span></a>
        </li>
        @endcan
        @can('users.delete')
        <li class="list-inline-item">
            {!! Form::open([
                'class'=>'delete',
                'url'  => route('users.destroy', $item->id), 
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
            <th>ID</th><td>{{ $item->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $item->name }} </td></tr>
                                    <tr><th> Email </th><td> {{ $item->email }} </td></tr>
                                    <tr><th> Avatar </th><td> 
                                        <a href="{{ $item->avatar }}">                                        
                                    <img class="w-2r bdrs-50p" src="{{ $item->avatar }}" alt="">
                                    </a> 
                                </td></tr>
                                    <tr><th> Biografìa </th><td> {{ $item->bio }} </td></tr>
        </tbody>
    </table>
</div>


@endsection






