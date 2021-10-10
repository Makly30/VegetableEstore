@extends('layout.master')
@section('title')
Login
@endsection
@section('content')
<h3 class="text-center pt-3">Login Form</h3>
@if(session('status'))
<div class="alert alert-danger" role="alert"> {{session('status')}}</div>
@endif
<form action="{{route('login.on')}}"method='post' enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="name">Username</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    @error('name')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
    @error('password')
      {{$message}}
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Login</button>
</form>
<small>Don't have an account?
    <a href="{{route('register')}}">Register</a>
</small>
@endsection