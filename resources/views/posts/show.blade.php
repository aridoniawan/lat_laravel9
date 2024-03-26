@extends('layouts.app')
@section('title')
    Show
@endsection
@section('content')    
<div class="container mt-4">
    <article class="blog-post">
        <h2 class="blog-post-title mb-1">{{$post->title}}</h2>
        <p class="blog-post-meta">{{date('d M Y H:i:s', strtotime($post->created_at))}}</p>
        
        <p>{{$post->content}}</p>
        <small class="text-muted">{{$total_comments}} Komentar</small>
        @foreach ($comments as $comment)
            <div class="card mb-3">
              <div class="card-body">
                <p style="font-size: 8pt">{{$comment->comment}}</p>
              </div>
            </div>
        @endforeach

      </article>
      <a href="{{url("posts")}}">< BACK</a>
</div>
@endsection