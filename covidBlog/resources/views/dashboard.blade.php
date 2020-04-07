@extends('layouts.app')

@section('content')

<div class="container-fixed">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    <strong>Post Feed</strong>
                    <a href="/posts/create" class="btn btn-success" style="float: right">Create New Blog</a> 
                </div>

                <div class="card-body">
<div class = "card p-3 mt-3 mb-3">
<table id="example" class="table table-striped table-bordered" style="width:100%">
    @if (count($posts) == 0)
            <tr><h6>No post to display!</h6></tr>
    @else 
            <thead>
                <tr>
                    <th>Blog Title</th>
                    <th>Date Created</th>
                    <th>Total Comments</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                            <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }}</td>
                            <td><a href="{{route('posts.comment_list', $post->id)}}">{{$post->comments()->count()}} <i class="fas fa-eye"></i></a></td>
                            <td align="center">
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'align: center'])!!}
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a> 
                                {{Form::hidden('_method', 'DELETE')}}
                                <a href="{{ route('posts.delete', $post->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            {!!Form::close()!!}
                            </td>
                    </tr>
                @endforeach
            </tbody>
    @endif
</table>
</div>
</div>
</div>
</div>
</div>
@endsection
