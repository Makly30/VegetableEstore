@extends('layout.master')
@section('title')
Vegetable
@endsection
@section('content')
<h3 class="text-center pt-4">Vegetable Board:</h3>
@if($veget)
<div class="row">
 @foreach($veget as $v)
 @if($v->timeto> Carbon\Carbon::now())   
 <div class="card m-2" style="width: 20rem;">
  <img src="{{URL::asset('storage/product_image/'.$v->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Product Name: {{$v->product_name}}<br>weight: {{$v->measure}} kg, price: {{$v->product_price}} baht</p>
    @if($v->amount>0)
    @if(!$v->owner(auth()->user()))
    <button class="btn btn-success"><a href="{{route('order',$v->id)}}" class="text-light">Order</a></button>
    @endif
    @else
    <button>Out of Stock</button>
    @endif
    <!-- detail -->
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
      
   
      <p class="pl-2 pr-2">ราคา: {{$v->product_price}} บาท ต่อน้ำหนัก {{$v->measure}} กิโลกรัม </p>
      <p class="pl-2 pr-2">สินค้าที่มีว่างข่าย: {{$v->firstamount}} กิโลกรัม</p>
      <p class="pl-2 pr-2">สินค้าที่มีว่างเหลือตอนนี้: {{$v->amount}} กิโลกรัม</p>
      <p class="pl-2 pr-2">จังหวัดที่ว่างข่าย :{{$v->province_from}}  </p>
      <p class="pl-2 pr-2">วันว่างข่าย :{{$v->timefrom}} </p>
      <p class="pl-2 pr-2">  วันหยุดข่าย:{{$v->timeto}} </p>
      <p class="pl-2 pr-2">ราคาขนส่่งภายในจังหวัด :{{$v->deliver_in}} บาท </p>
      <p class="pl-2 pr-2"> ราคาขนส่งนอกจังหวัด:{{$v->deliver_out}} บาท</p>
      <p class="pl-2 pr-2">ระยะเวลาส่งโดยประมาณคิดเป็นวัน : {{$v->available_time}} วัน</p>
      <p class="pl-2 pr-2">seller : {{$v->user->name}}  </p>
    </div>
    </div>
    <!-- enddetail -->
  </div>

@endif
@endforeach   
</div>



@endif
@endsection