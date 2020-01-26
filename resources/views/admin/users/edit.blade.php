@extends('layouts.admin')
@section('content')
@include('admin.includes.form_errors') 
 <h2 class="text-center">Edit user</h2>
  <div class="col-lg-3">
    <img src="{{ $user->photo->name }}" height="200px" width="200px">
  </div>
    <div class="col-lg-9">
      {{ Form::model($user ,['method'=>'PATCH','action'=>['AdminUserController@update',$user->id],'files' => true]) }}
      <div class="form-group">
        {{ Form::label('name','Username') }}
        {{ Form::text('name',"$user->name",['class'=>'form-control','placeholder'=>'Enter username']) }}
       </div>
       <div class="form-group">
        {{ Form::label('email','Email')}}
        {{ Form::email('email',"$user->email",['class'=>'form-control','placeholder'=>'Enter Email Adrress']) }}
        </div>
        <div class="form-group">
          {{ Form::label('role_id','Role') }}
          {{ Form::select('role_id', $role , 'options' , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('is_active','Status') }}
         {{ Form::select('is_active', [1 => 'Active',0 => 'Not Active'], null , ['class' => 'form-control']) }}
        </div>
         <div class="form-group">
          {{ Form::label('file','Image') }}
          {{ Form::file('file',['class'=>'form-control'])  }}
        </div>

        <div class="form-group">
          {{Form::submit('Update User',['class'=>'btn btn-primary']) }}
        </div>
      {{ Form::close() }}

      {{ Form::open( ['method'=>'DELETE','action'=>['AdminUserController@destroy',$user->id]] ) }}
        <div class="form-group">
          {{ Form::submit('Delete User',['class'=>'btn btn-danger']) }}
        </div>  
      {{ Form::close() }}


    </div>
@endsection