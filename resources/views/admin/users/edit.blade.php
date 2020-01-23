@extends('layouts.admin')
@section('content')
@include('admin.includes.form_errors') 
    <div class="jumbotraon">
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
         {{ Form::select('is_active', [1 => 'Active',0 => 'Not Active'], 0 , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('password','Password') }}
         {{ Form::password('password',['class' => 'form-control','placeholder'=>'Enter Password']),"testing"}}
        </div>
         <div class="form-group">
          {{ Form::label('file','Image') }}
          {{ Form::file('file',['class'=>'form-control'])  }}
        </div>

        <div class="form-group">
          {{Form::submit('Update User',['class'=>'btn btn-primary']) }}
        </div>
      {{ Form::close() }}
    </div>
@endsection