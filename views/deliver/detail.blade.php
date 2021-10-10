@extends('layout.master')
@section('title')
detail deliver
@endsection
@section('content')
@if($deliver_list)
        
    <div class="row">
    @foreach($deliver_list as $d)
        <div class="col-4">
        <img src="{{URL::asset('storage/product_image/'.$d->deliverservice->image)}}" class="card-img-top" alt="..." style="width:100%" >
        </div>
        <div class="col-4">
        <h3 class="text-center p-3">Deliver Service Details:</h3>
   
   <p>Destination: {{$d->deliverservice->province->PROVINCE_NAME}} to {{$d->deliverservice->provinces->PROVINCE_NAME}}</p>
   <p>Departure Customer Name: {{$d->sell->name}}</p>
   <p>Departure Customer Address: {{$d->sell->address}}</p>
   <p>Departure Customer Phone: {{$d->sell->phone}}</p>
   <p>Arrival Customer Name: {{$d->orderveget->usercustomer->name}}</p>
   <p>Arrival Customer Address: {{$d->orderveget->usercustomer->address}}</p>
   <p>Arrival Customer Phone: {{$d->orderveget->usercustomer->phone}}</p>
   <p>Tracking Code: {{$d->orderveget->tracking}}</p>
   <p>Tracking Place: {{$d->orderveget->trackingcode->tr_place}}</p>

            </div>
    </div>
    
        @endforeach
    @endif
</div>
@endsection