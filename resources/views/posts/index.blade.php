  @extends('layouts.app')
  @section('title')
      Blog
  @endsection
  @section('content')      
  <div class="container mt-4">
      <h1>News Blog
          <a href="{{url("posts/create")}}" class="btn btn-primary">Tulis</a>
      </h1>
      @foreach ($posts as $post)
      <div class="card mb-3">
          <div class="card-body">
              <h5 class="card-title">{{$post->title}}</h5>
              {{-- <a href="{{$post->content}}">{{$post->content}}</a> --}}
              <p class="card-text">{{$post->content}}</p>
              <p class="card-text"><small class="text-muted">Last updated {{date('d M Y H:i:s', strtotime($post->created_at))}}</small></p>
              <a href="{{url("posts/$post->id")}}" class="btn btn-secondary">Selengkapnya</a>
              <a href="{{url("posts/$post->id/edit")}}" class="btn btn-success">EDIT</a>
          </div>
      </div>
      @endforeach
  </div>
  @endsection