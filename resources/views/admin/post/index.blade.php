@extends('layouts.admin')
@section('content') 
   <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Photo</td> 
                    <td>Owner</td> 
                    <td>Category Id</td>
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
                        <td><img src="{{ $post->photo? $post->photo->name:'test'}} " width="100%" height="50px"></td>
                        <td><a href="{{ route('posts.edit',$post->id) }}">{{$post->user->name}}</a></td>
                        <td>{{ $post->category? $post->category->id : "Uncategorized"}}</td>
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