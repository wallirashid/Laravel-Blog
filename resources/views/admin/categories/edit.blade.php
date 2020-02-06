@extends('layouts.admin')
@section('content')
    <div class="col-md-4">
    {{ Form::open(['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) }}
        <div class="form-group">
            {{ Form::text('categories',$category->name,['class'=>'form-control','placeholder'=>'Enter Categoriess']) }}     
        </div>
        <div class="form-group">
            {{ Form::submit('Update Category',['class'=>'btn btn-primary'])}}
        </div>   
    {{ Form::close() }}

    {{ Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]] ) }}
         <div class="form-group">
            {{ Form::submit('Delete Category',['class'=>'btn btn-danger'])}}
        </div> 
    {{ Form::close() }}
    </div>
@endsection