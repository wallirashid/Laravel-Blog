@extends('layouts.admin')
@section('content') 
   <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Owner</td> 
                    <td>Category Id</td> 
                    <td>Photo Id</td> 
                    <td>Title</td>
                    <td>Body</td>  
                    <td>Created At</td>
                    <td>Updated At</td>    
                </tr>    
            </thead>            
            <tbody>
                @if($posts)
                    @foreach($posts as $post )
                        <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category_id}}</td>
                        <td>{{$post->photo_id}}</td>
                        <td>{{$post->title}}</td>
                         <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @endif    
            </tbody>
        </table> 
@stop