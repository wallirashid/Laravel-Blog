@extends('layouts.admin')
@section('content')
 <h2>User Listing here</h2>

    @if(Session::has('create_user'))
        <div class="alert alert-success">{{Session::get('create_user')}}</div>
    @endif

    @if(Session::has('delete_user'))
        <div class="alert alert-danger">{{session('delete_user')}}</div>
    @endif
    <div class="users-table">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Image</td> 
                    <td>username</td> 
                    <td>email</td> 
                    <td>Role</td>
                    <td>Active</td>  
                    <td>Created At</td>
                    <td>Updated At</td>    
                </tr>    
            </thead>            
            <tbody>
                @if($users)
                    @foreach($users as $user )
                        <tr>
                        <td>{{$user->id}}</td>
                         <td><img src="{{ $user->photo ?  $user->photo->name : 'placeholder.jpg'}}" height="50px"></td>
                        <td><a href="{{ route( 'users.edit',$user->id) }}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                         <td>{{$user->is_active == 1? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @endif    
            </tbody>
        </table>
    </div>
@endsection
