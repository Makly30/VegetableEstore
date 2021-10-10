@extends('layout.master')
@section('title')
MyInfo
@endsection
@section('content')
<div class="container">
    @if($info)
    @foreach($info as $i)
    <h3 class="text-center p-3">Account Infomation</h3>
    <div class="row">
        <div class="col-4">
        <img src="{{URL::asset('storage/covers/'.$i->image)}}" class="card-img-top" alt="..." style="width:100%" >
        </div>
        <div class="col-4">
            <p >Name: {{$i->name}}</p>
            <p >First Name: {{$i->fname}}</p>
            <p >Last Name{{$i->lname}}</p>
            <p >Email: {{$i->email}}</p>
            <p >Phone Number: {{$i->phone}}</p>
            <p >Address: {{$i->address}}</p>
            <p >Status: {{$i->status}}</p>
            </div>
            <button class="btn btn-warning"><a href="{{route('edit.info',auth()->user()->id)}}" class="text-light">Edit Profile</a></button>
    </div>
    
   
    @endforeach
    @endif
</div>
@endsection