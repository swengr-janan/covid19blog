@extends('layouts/app')

@section('content')

    <h1>Create New Post</h1>
    
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'What is your blog title?'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body' )}}
        {{Form::textarea('body', '', ['id'=> 'editor', 'class' => 'form-control', 'placeholder' => 'Write something about your blog.'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        {{Form::submit('Post New Blog', ['class' => 'btn btn-primary'])}}  
    <hr>
    {!! Form::close() !!}
    
    
@endsection