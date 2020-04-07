@extends('layouts/app')

@section('content')

<h1 class="text-center">Blog Postings</h1>

    @if (count($posts)>0)
        @foreach ($posts as $post)
        <div class="card p-3 mt-3 mb-3">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                <a href="/posts/{{$post->id}}">
                <img style = "width:100%" class="w-100" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                </div>
                <div class="col-md-8 col-sm-8">
                     <a href="/posts/{{$post->id}}">
                     <h3>{{$post->title}}</h3>
                     </a>
                     <p>{!!$post->body!!}</p>
                    <p>Written at {{ \Carbon\Carbon::parse($post->created_at)->format('j F, Y') }} by <strong>{{$post->user->name}}</strong></p>    
                </div>
            </div>
       
        </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <h3 class="pt-3 text-center">NO BLOGS AVAILABLE!</h3>
    @endif
    
@endsection