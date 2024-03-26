@extends('layouts.app')
@section('title')
    Register
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
                <form action="{{ url('register') }}" method="POST" class="form">
                  @csrf
                  <div class="mb-3">
                      <label for="exampleInputName" class="form-label">Name:</label>
                      <input type="text" class="form-control" id="exampleInputName" name="name">
                      @if($errors->has('name'))
                          <span class="text-danger">{{$errors->first('name')}}</span>
                      @endif
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address:</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                      @if($errors->has('email'))
                          <span class="text-danger">{{$errors->first('email')}}</span>
                      @endif
                  </div>
                  <div class="mb-3">
                      <label for="password" class="form-label">Password:</label>
                      <input type="password" class="form-control" id="password" name="password">
                      @if($errors->has('password'))
                          <span class="text-danger">{{$errors->first('password')}}</span>
                      @endif
                  </div>
                  <div class="mb-3">
                      <label for="password_confirmation" class="form-label">Confirm Password:</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                  </div>
                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Daftar</button>
                  </div>
              </form>              
            </div>
        </div>
    </div>
</div>
@endsection