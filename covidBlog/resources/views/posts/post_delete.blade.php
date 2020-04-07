@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <h1>Do you really wish to delete the post?</h1>
            <p>
                <strong>Title: </strong>{{ $posts->title }}<br>
                <strong>Body: </strong>{!!$posts->body!!}<br>
            </p>
            {{Form::open(['route' => ['posts.destroy', $posts->id], 'method' => 'DELETE']) }}
                {{ Form::submit('Yes, I do', ['class' => 'btn btn-lg btn-block btn-danger'])}}
            {{Form::close()}}
            <br>
            <a href="/dashboard" class="btn btn-lg btn-block btn-primary"><i class="fas fa-backward"></i>  Go back</a>
        </div>
    </div>
@endsection     