@extends('layouts.admin')
@section('content')
    <div class="users-table">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <td>Id</td> 
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
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                         <td>{{$user->is_active == 1? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        </tr>
                    @endforeach
                @endif    
            </tbody>
        </table>
    </div>
@endsection
