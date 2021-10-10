@extends('layout.master')
@section('title')
DeliverService
@endsection
@section('content')
<h3 class="text-center pt-4">Deliver Service Board:</h3>
<div class='text-center text-danger'><small>ลูกค้าทุกคนต้องนำสินค้ามาถึงที่จัดส่งก่อนเวลาเดินทาง 1 ชั่วโมง</small></div>
@if($deliver_service)
<div class="row">
 @foreach($deliver_service as $v)
 @if($v->timeto>Carbon\Carbon::now())   
 <div class="card m-2" style="width: 18rem;">
  <img src="{{URL::asset('storage/product_image/'.$v->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">{{$v->province->PROVINCE_NAME}}-{{$v->provinces->PROVINCE_NAME}}</p>
    <p class="card-text">{{$v->timefrom}}-{{$v->timeto}}</p>
    <p class="card-text"> price: {{$v->price}} baht</p>
    @if(auth()->user()->status=='seller')
    <button class="btn btn-success"><a href="{{route('adddeliver',['id'=>$v->id,'owner'=>auth()->user()->id])}}" class="text-light">Order</a></button>
    @endif
    <hr>
    <h4 class="panel-title">

        <button type="button"  class="btn btn-primary" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$v->id}}" aria-expanded="false" aria-controls="collapseOne{{$v->id}}">
         Detail
        </button>
        
      </h4>
    </div>
    <!-- collapse1 -->
    <div id="collapseOne{{$v->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne{{$v->id}}">
      <div class="panel-body">
      
   
      <p class="pl-2 pr-2">ราคา: {{$v->price}} บาท  </p>
      <p class="pl-2 pr-2">วันว่างข่าย :{{$v->timefrom}} </p>
      <p class="pl-2 pr-2">  วันหยุดข่าย:{{$v->timeto}} </p>
      <p class="pl-2 pr-2">ระยะเวลาส่งโดยประมาณคิดเป็นชั่วโมง :<br> {{$v->duration}} ชั่วโมง</p>
      <p class="pl-2 pr-2">Deliver Name : {{$v->drive->name}} <br>Deliver Address: {{$v->drive->address}} </p>
      
    </div>
    </div>

</div>
@endif
@endforeach   
</div>
@endif
@endsection