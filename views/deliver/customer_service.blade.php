@extends('layout.master')
@section('title')
Mycustomerorderservice
@endsection
@section('content')
<h3 class="text-center pt-3">Order Deliver Service:</h3>
<div class="container">
@if($deliver_list)
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Veget CusName</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Total Price (BAHT)</th>
      <th scope="col">Time Deliver</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
 
  <tbody>
    @foreach($deliver_list as $m)   
    <tr>
        <td >{{$m->id}}</td>
        <td>{{$m->orderveget->usercustomer->name}}</td>
        <td >{{$m->sell->name}}</td>
        <td>{{$m->deliverservice->price}}</td>
        <td >{{$m->deliverservice->timefrom}}</td>
        <td>
          <button class="btn btn-info" ><a href="{{route('showdetaildeliver',$m->id)}}" class="text-light">Details</a></butoon>
        </td>
        <td>
          @if($m->orderveget->tracking!=null)
          @if($m->orderveget->trackingcode->process_status==3)
          <button class="btn btn-success" >Delivered</butoon>
          @else
        <button class="btn btn-success" ><a href="{{route('updatelocation',$m->id)}}" class="text-light">Update</a></butoon>
        @endif
        @else
        @endif
        </td>
    </tr>
      @endforeach
  </tbody>

</table>
</div>

@endif

@endsection