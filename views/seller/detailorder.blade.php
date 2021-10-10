@extends('layout.master')
@section('title')
CustomerOrderDetail
@endsection
@section('content')
<div class="container">
    <h3 class="text-center p-3">Order Detail</h3>
    @if($myorder)
        @foreach($myorder as $m)
        <div class="row">
            <div class="col-4">
            <img src="{{URL::asset('storage/product_image/'.$m->product->image)}}" class="card-img-top" alt="..." style="width:100%" >
            </div>
            <div class="col-4">
                  <p>Product Name: {{$m->product->product_name}}</p>
            <p>Product Amount: {{$m->orp_amount}} KG</p>
            <p>Price Only Product:{{(($m->product->product_price)*( $m->orp_amount))/($m->product->measure)}} BAHT</p>
           <!--  -->
            @if($m->deliver_choice_id==1)
                <p>Delivery Price: {{$m->product->deliver_in}} BAHT</p>
            @elseif($m->deliver_choice_id==2)
                <p>Delivery Price: {{$m->product->deliver_out}} BAHT</p>
            @endif
            <!--  -->
            @if($m->deliver_choice_id==1)
                <p> Total Price: {{(($m->product->product_price)*( $m->orp_amount))/($m->product->measure)+($m->product->deliver_in)}} Baht</p>
            @elseif($m->deliver_choice_id==2)
                <p>Total Price: {{(($m->product->product_price)*( $m->orp_amount))/($m->product->measure)+($m->product->deliver_out)}} Baht</p>
            @endif
            <p>Tracking Code: {{$m->tracking}}</p>
            @if($m->tracking!=null)
            <p>Tracking Code: {{$m->trackingcode->processtracking->process_name}}</p>
            <p>Arrive Time: {{$m->trackingcode->updated_at}}</p>
            @endif
            <p>Customer: {{$m->usercustomer->name}}</p>
                </div>
        </div>
          
        @endforeach
    @endif
</div>
@endsection