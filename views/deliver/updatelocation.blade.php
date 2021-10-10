@extends('layout.master')
@section('title')
Updatelocation
@endsection
@section('content')
<div class="container">
    <h3 class="m-2">Update Location</h3>
    @if($tracking)
    @foreach($tracking as $d)
    <form action="{{route('updatelocal',$d->id)}}" method="post">
        @csrf
        @method('PUT')
        <p>Destination:</p>
        <p> จาก {{$d->deliverlist->deliverservice->province->PROVINCE_NAME}} ไป {{$d->deliverlist->deliverservice->provinces->PROVINCE_NAME}} </p>
        <p>Start Time</p>
        <p>{{$d->deliverlist->deliverservice->timefrom}}</p>
        <div class="form-group">
            <label class="label label-control" for ='process'>Process Status</label>
            <select name="process" id='process' class="form-control">
                           @foreach($status as $s)
                           <option value="{{$s->id}}" @if($d->process_status==$s->id)
                           selected="selected" 
                           @endif >{{$s->process_name}}</option>
                           @endforeach
                       </select>
        </div>
        <div class="form-group">
           <label class="label label-control">Location </label>
        <input type="text" class="form-control" value="{{$d->tr_place}}" id="location" name="location"> 
        </div>
        <div class="form-group">
            <input type="submit" value="update">
        </div>
        
    </form>
    @endforeach
    @endif
</div>
@endsection