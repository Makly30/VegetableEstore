@extends('layout.master')
@section('title')
Own Produt
@endsection
@section('content')
<button class="btn btn-primary"><a href="{{route('addproduct')}}" class="text-light">Add Product</a></button>
<h3 class="text-center ">My Product</h3>
<div class="text-center text-danger"><small>คุณสามารถลบสินค้าของคุณ แต่รายการที่ทำกับสินค้านั้น ๆ ก็จะไม่มีเหมือนกัน กรุณาลบก่อนสินค้าจะมีการดำเนินการค้า</small></div>
@if($veget)
<div class="row">
@foreach($veget as $v)
@if($v->owner(auth()->user()))
<div class="card m-3" style="width: 18rem;">
  <img src="{{URL::asset('storage/product_image/'.$v->image)}}" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Product Name: {{$v->product_name}}</p>
    <p class="card-text">weight: {{$v->measure}} kg, price: {{$v->product_price}} baht</p>
    @if($v->timeto> Carbon\Carbon::now())
    <button class="btn btn-success">Available</button>
    @else
    <button class="btn btn-warning">Finished</button>
    @endif
    <hr>
    @can('delete',$v)
    <form action="{{route('vegetable.delete',$v->id)}}" method="post">
      @csrf
      @method('DELETE')
      <input type="submit" class="btn btn-danger" value="Delete">
    </form>
    @endcan
    <hr><h4 class="panel-title">
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

 
</div>
@endif
@endforeach
</div>
@endif
@endsection