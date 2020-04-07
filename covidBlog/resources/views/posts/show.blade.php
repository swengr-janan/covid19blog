@extends('layouts/app')

@section('content')
    <h1 class="text-center">{{$post->title}}</h1>
    <div class="card p-3 mt-3 mb-3">

        <!-- Displaying the topic/selected blog -->
        <div class="row">
            <div class="col-md-4 col-sm-4">
            <img style = "width:100%" class="w-100" src="/storage/cover_images/{{$post->cover_image}}" alt="">
            </div>
            <div class="col-md-8 col-sm-8">
                 </a>
                 <p>{!!$post->body!!}</p>
                <p>Written at {{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }} by <strong>{{$post->user->name}}</strong></p>   
            </div>

            <div class="col-md-8 col-sm-8 pt-3">
                @if (!Auth::guest())
                    @if (Auth::user()->id == $post->user_id)
                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit Post</a>
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger', 'align' => 'right'])}}
                        {!!Form::close()!!}
                    @endif
                @endif
            </div>
        </div>
        <hr> 
        <!-- Displaying comments -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="comments-title"><span class="fas fa-comments"></span>  {{ $post->comments()->count() }} Comments</h3>
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <div class="author-info">
    
                            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                            <div class="author-name">
                                <h6>Name: {{ $comment->name }}</h6>
                                <p class="author-time">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}
                                    @if (!Auth::guest() && Auth::user()->name == $comment->name)
                                    |    <a href="{{ route('comments.delete', $comment->id)}}"><i class="fas fa-trash"></i></a>
                                    @endif
                                </p>
                            </div>
                            
    
                        </div>
    
                        <div class="comment-content">
                            {{ $comment->comment }}
                        </div>
    
                    </div>
                @endforeach
            </div>
        </div>

         <!-- Forms for comment -->
         @if (!Auth::guest())
            <div class="row">
                <div id="comment-form" class="col-md-12 col-md-offset-2" style="margin-top: 50px;">
                    {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('comment', "Comment:") }}
                                {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
        
                                {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                            </div>
                        </div>
        
                    {{ Form::close() }}
                </div>
            </div>
        @else
        <div class="row">
            <div id="comment-form" class="col-md-12 col-md-offset-2" style="margin-top: 50px;">
                {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('name', "Name:") }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
    
                        <div class="col-md-6">
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::text('email', null, ['class' => 'form-control']) }}
                        </div>
    
                        <div class="col-md-12">
                            {{ Form::label('comment', "Comment:") }}
                            {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3']) }}
    
                            {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
                        </div>
                    </div>
    
                {{ Form::close() }}
            </div>
        </div>
        @endif
   
    </div>
        
@endsection     