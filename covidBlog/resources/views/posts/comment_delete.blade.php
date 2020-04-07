@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <h1>Do you really wish to delete the comment?</h1>
            <p>
                <strong>Name: </strong>{{ $comment->name }}<br>
                <strong>Email: </strong>{{ $comment->email }}<br>
                <strong>Comment: </strong>{{ $comment->comment }}
            </p>
            {{Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
                {{ Form::submit('Yes, I do', ['class' => 'btn btn-lg btn-block btn-danger'])}}
            {{Form::close()}}
            <br>
            <a href="{{route('posts.comment_list', $comment->post->id)}}" class="btn btn-lg btn-block btn-primary"><i class="fas fa-backward"></i>  Go back</a>
        </div>
    </div>
@endsection     