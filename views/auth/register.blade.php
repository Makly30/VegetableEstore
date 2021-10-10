@extends('layout.master')
@section('title')
Register
@endsection
@section('content')
<h3 class="text-center">Register Form</h3>
<form action="{{route('register.store')}}"method='post' enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="name">Username</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    @error('name')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="fname">First name</label>
    <input type="text" class="form-control" id="fname" name="fname" value="{{old('fname')}}">
    @error('fname')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="lname">Last name</label>
    <input type="text" class="form-control" id="lname" name="lname" value="{{old('lname')}}">
    @error('lname')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
    @error('email')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control" id="phone" name="phone"  value="{{old('phone')}}">
    @error('phone')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address"  value="{{old('address')}}">
    @error('address')
      {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="status">Status</label>
   <select name='status' id='status' class='form-control'>
       <option value=1>Seller</option>
       <option value=2>Customer</option>
       <option value=3>Deliver</option>
   </select>
  </div>
  <div class="form-group">
    <label for="image">Profile Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<small>Do you have an account?
    <a href="{{route('login')}}">Login</a>
</small>
@endsection