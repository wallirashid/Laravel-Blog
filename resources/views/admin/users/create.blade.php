@extends('layouts.admin')
@section('content')
@include('admin.includes.form_errors') 
    <div class="jumbotraon">
      {{ Form::open(['method'=>'post','action'=>'AdminUserController@store','files' => true]) }}
      <div class="form-group">
        {{ Form::label('uname','Username') }}
        {{ Form::text('username','',['class'=>'form-control']) }}
       </div>
       <div class="form-group">
        {{ Form::label('email','Email')}}
        {{ Form::email('email','',['class'=>'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('role_id','Role') }}
          {{ Form::select('role_id', [''=>'Choose Options'] + $roles , 'options' , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('is_active','Status') }}
         {{ Form::select('is_active', [1 => 'Active',0 => 'Not Active'], 0 , ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('password','Password') }}
         {{ Form::password('password',['class' => 'form-control','placeholder'=>'Enter Password']),'' }}
        </div>
         <div class="form-group">
          {{ Form::label('file','Image') }}
          {{ Form::file('file',['class'=>'form-control'])  }}
        </div>

        <div class="form-group">
          {{Form::submit('Create User',['class'=>'btn btn-primary']) }}
        </div>
      {{ Form::close() }}
    </div>
@endsection