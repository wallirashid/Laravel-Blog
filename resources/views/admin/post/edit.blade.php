@extends('layouts.admin')
@section('content')
<div class="col-lg-3">
    <img src="{{ $post->photo->name }}" class="img-responsive">
</div>
<div class="col-lg-9">
  {{ Form::open(['method'=>'PATCH','action'=>['AdminPostController@update',$post->id],'files'=>true]) }}
        <div class="form-group">
            {{ Form::label('title','Title:') }}
            {{ Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Post Title']) }}
        </div>
         <div class="form-group">
            {{ Form::label('category','Category') }}
            {{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}
        </div>
         <div class="form-group">
            {{ Form::label('photo_id','Image') }}
            {{ Form::file('photo_id',['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label("message","Desscription") }}
            {{ Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Enter your description']) }}
        </div>
         <div class="form-group">
            {{ Form::submit("Update Post",['class'=>'btn btn-primary']) }}
        </div>
  {{ Form::close() }}
    <!--Form For delete-->
    {{ Form::open(['method'=>'DELETE','action'=>['AdminPostController@destroy',$post->id],'files'=>'true']) }}
        <div class="form-group">
            {{ Form::submit('delete',['class'=>'btn btn-danger'])}}
        </div>
    {{ Form::close() }}
   </div> 
@stop   