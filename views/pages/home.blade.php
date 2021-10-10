@extends('layout.master')
@section('title')
Home
@endsection
@section('content')
<div class="container">
    <h3 class="text-center p-3">Welcome to Vegetable-Estore</h3>
    @guest
    <p class="text-center">Please login or signup before processing in this page!</p>
    @endguest
</div>
@endsection