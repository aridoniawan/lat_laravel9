@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-md-4">
        <div class="card cal-md-4">
            <div class="card-body">
                <h1 class="text-center">
                    Login
                </h1>
                @if(session('error_message'))
                <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                  {{ session('error_message') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{url('login')}}" method="POST" class="form-control">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection