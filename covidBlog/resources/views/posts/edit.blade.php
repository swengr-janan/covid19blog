@extends('layouts/app')

@section('content')

    <h1>Edit Blog ({{$post->title}})</h1>
    
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'What is your blog title?'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body' )}}
        {{Form::textarea('body', $post->body, ['id'=> 'editor', 'class' => 'form-control', 'placeholder' => 'Write something about your blog.'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save changes', ['class' => 'btn btn-primary'])}}  
    <hr>
    {!! Form::close() !!}
    
@endsection