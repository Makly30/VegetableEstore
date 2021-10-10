@extends('layout.master')
@section('title')
EditInfo
@endsection
@section('content')
<h3 class="text-center">Edit Info</h3>
<form action="{{route('update.info',auth()->user()->id)}}"method='post' enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if($user)
    @foreach($user as $u)
  <div class="form-group">
    <label for="name">Username</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$u->name}}">
    @error('name')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="fname">First name</label>
    <input type="text" class="form-control" id="fname" name="fname" value="{{$u->fname}}">
    @error('fname')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="lname">Last name</label>
    <input type="text" class="form-control" id="lname" name="lname" value="{{$u->name}}">
    @error('lname')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$u->email}}">
    @error('email')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control" id="phone" name="phone"  value="{{$u->phone}}">
    @error('phone')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address"  value="{{$u->address}}">
    @error('address')
      {{$message}}
    @enderror
  </div>

  <div class="form-group">
    <label for="image">Profile Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
  <div class="form-group">
    <label for="password">Current Password</label>
    <input type="password" class="form-control" id="Current_password" name="Current_password" >
    @error('Current_password')
      {{$message}}
    @enderror
   
  </div>
  <div class="form-group">
    <label for="password">New Password</label>
    <input type="password" class="form-control" id="password" name="password">
    @error('password')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="password_confirmation">Re-Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    @error('password')
      {{$message}}
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Edit</button>
  @endforeach
  @endif
</form>
<small>Do you have an account?
    <a href="{{route('login')}}">Login</a>
</small>
@endsection