@extends('layouts.app')
@section('title')
    Edit Blog
@endsection
@section('content')    
<div class="container mt-4">
  <h1>Edit Menu
  </h1>
  <form action="{{url("posts/$post->id")}}" method="post" class="form-control mt-5">    
    @method('PATCH')
    @csrf
      <div class="mb-3">
          <label for="title" class="form-label">Judul</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Konten</label>
          <textarea class="form-control" id="content" rows="3" name="content">{{$post->content}}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <form action="{{url("post/$post->id")}}" method="post">
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </form>
</div>
@endsection
