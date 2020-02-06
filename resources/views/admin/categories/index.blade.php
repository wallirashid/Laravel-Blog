@extends('layouts.admin')

@section('content')
    <div class="col-md-4">
        <h2>Categories</h2>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error )
                    <p>{{ $error }}</p>
                @endforeach
            </div>
         @endif
         @if(Session::has('delete_cat'))
            <div class="alert alert-danger">{{ Session::get('delete_cat') }}</div>
         @endif

        {{ Form::open(['method'=>'post','action'=>'AdminCategoriesController@store']) }}
            <div class="form-group">
                {{ Form::text('categories',null,['class'=>'form-control','placeholder'=>'Enter Categoriess']) }}
               
            </div>
            <div class="form-group">
                {{ Form::submit('Create Category',['class'=>'btn btn-primary'])}}
              </div>   
        {{ Form::close() }}
    </div>
     <div class="col-md-8">
         <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('categories.edit',$category->id) }}">{{ $category->name }}</a></td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
     </div>
@stop
