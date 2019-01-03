
@extends('admin.default')

@section('page-header')
    Category <small>{{ trans('app.update_item') }}</small>
@stop

@section('content')

<ul class="list-inline">
        <li class="list-inline-item">
    <a href="{{ route('category.index') }}" class="btn btn-warning btn-sm" title="{{ trans('app.view_button') }}">
        <span class="ti-arrow-left"></span> 
    </a>
</li>
</ul>

    {!! Form::model($category, [
            'action' => ['Admin\CategoryController@update', $category->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    @include ('admin.category.form', ['formMode' => trans('app.update_item') ])

        
    {!! Form::close() !!}
    
@stop


