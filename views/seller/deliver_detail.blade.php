@extends('layout.master')
@section('title')
Delivery order service
@endsection
@section('content')
<div class="container">
@if($deliver_list)
        
    <div class="row">
    @foreach($deliver_list as $d)
        <div class="col-4">
        <img src="{{URL::asset('storage/product_image/'.$d->deliverservice->image)}}" class="card-img-top" alt="..." style="width:100%" >
        </div>
        <div class="col-4">
        <h3 class="text-center p-3">Deliver Service Details:</h3>
   
   <p>Destination: {{$d->deliverservice->province->PROVINCE_NAME}} to {{$d->deliverservice->provinces->PROVINCE_NAME}}</p>
   <p>Time: {{$d->deliverservice->timefrom}} to {{$d->deliverservice->timeto}}</p>
   <p>Veget Customer Name: {{$d->orderveget->usercustomer->name}}</p>
   <p>Product Name: {{$d->orderveget->product->product_name}}, Total Amount:{{$d->orderveget->orp_amount}}  KG</p>
   <p>Deliver Name: {{$d->driver->name}}</p>
   <p>Deliver Phone: {{$d->driver->phone}}</p>
   @foreach($tracking as $t)
   <p>Tracking Code: {{$t->id}}</p>
   <p>Tracking Place: {{$t->tr_place}}</p>
   <p>Tracking status: {{$t->processtracking->process_name}}</p>
    @endforeach
            </div>
    </div>
    
        @endforeach
    @endif
</div>

@endsection