@extends('layout.master')
@section('title')
MyorderVegetDetail
@endsection
@section('content')
<div class="container">
    <h3 class="text-center p-3">Order Detail</h3>
    @if($myorder)
       
        <div class="row">
             @foreach($myorder as $m)
            <div class="col-4">
            <img src="{{URL::asset('storage/product_image/'.$m->product->image)}}" class="card-img-top" alt="..." style="width:100%" >
            </div>
            <div class="col-4">
               <p>Product Name: {{$m->product->product_name}}</p>
            <p>Product Amount: {{$m->orp_amount}} KG</p>
            <p>Product total Price: {{(($m->product->product_price)*( $m->orp_amount))/($m->product->measure)}} Baht</p>
            @if($m->deliver_choice_id==1)
                <p>Delivery Type: Delivery Inside Province</p>
                <p>Delivery Price: {{$m->product->deliver_in}} Baht</p>
            @elseif($m->deliver_choice_id==2)
                <p>Delivery Type: Delivery Outside Province</p>
                <p>Delivery Price: {{$m->product->deliver_out}} Baht</p>
            @endif
            @if($m->deliver_choice_id==1)
                <p> Total Price: {{(($m->product->product_price)*( $m->orp_amount))/($m->product->measure)+($m->product->deliver_in)}} Baht</p>
            @elseif($m->deliver_choice_id==2)
                <p>Total Price: {{(($m->product->product_price)*( $m->orp_amount))/($m->product->measure)+($m->product->deliver_out)}} Baht</p>
            @endif
            <p>Tracking Code: {{$m->tracking}}</p>
            @if($m->tracking==null)
            @else
            <p>Deliver Name: {{$m->trackingcode->deliverlist->driver->name}}</p>
            <p>Deliver phone: {{$m->trackingcode->deliverlist->driver->phone}}</p>
            <p>Tracking Place: {{$m->trackingcode->tr_place}}</p>
            <p>Tracking Status: {{$m->trackingcode->processtracking->process_name}}</p>
            <p>Delivered Time: {{$m->trackingcode->updated_at}}</p>
            @endif
            <p>Seller: {{$m->product->user->name}}</p>
            <p>Seller Phone Contact: {{$m->product->user->phone}}</p> 
                </div> 
                 @endforeach
        </div>
            
      
    @endif
</div>
@endsection