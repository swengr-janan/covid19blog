@extends('layouts/app')

@section('content')

<div class="container-fixed">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">
                    <h1 class="text-center">{{$post->title}}</h1>
                </div>  
                <div class="card-body" >
                        <div class="select" style="width: 20rem;">
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <h3 class="comments-title"><span class="fas fa-comments"></span>  {{ $post->comments()->count() }} Comments</h3>
                            @foreach($post->comments as $comment)
                                <div class="comment">
                                    <div class="author-info">
                
                                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                                        <div class="author-name">
                                            <h6>Name: {{ $comment->name }}</h6>
                                            <p class="author-time">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}
                                            |    <a href="{{ route('comments.delete', $comment->id)}}"><i class="fas fa-trash"></i></a>
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
            </div>
        </div>
    </div>
</div>
        
@endsection     