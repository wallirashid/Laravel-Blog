@extends('layouts.admin')
@section('content')
@if(count($errors) > 0)
 <div class="alert alert-danger">
    @foreach ($errors->all() as $error )
       <p> {{ $error }} </p>
    @endforeach
 @endif   
 </div>  

  {{ Form::open(['method'=>'post','action'=>'AdminPostController@store','files'=>true]) }}
        <div class="form-group">
            {{ Form::label('title','Title:') }}
            {{ Form::text('title',null,['class'=>'form-control','placeholder'=>'Post Title']) }}
        </div>
         <div class="form-group">
            {{ Form::label('category','Category') }}
            {{ Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control']) }}
        </div>
         <div class="form-group">
            {{ Form::label('photo_id','Image') }}
            {{ Form::file('photo_id',['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label("message","Desscription") }}
            {{ Form::textarea('body',null,['class'=>'form-control','placeholder'=>'Enter your description']) }}
        </div>
         <div class="form-group">
            {{ Form::submit("Create Post",['class'=>'btn btn-primary']) }}
        </div>
  {{ Form::close() }}
@stop   