@extends('layout.master')
@section('title')
OrderDeliver
@endsection
@section('content')
@if($deliver_service)
@foreach($deliver_service as $d)
<div class="container">
    <h3 class="text-center pt-3">
        Order Deliver Service: 
    </h3>
    <form action="{{route('adddeliver.add',[
        'deliver'=>$d->drive->id,'seller'=>auth()->user()->id,'deliver_service'=>$d->id])}}" method="post">
        @csrf
        <div class="form-group">
            <label class="label label-control"for='seller'>
                Customer Name: 
            </label>
            <select class="form-control" id="seller" name="seller">
                <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
            </select>
        </div>
        <div class="form-group">
            <label class="label label-control" for="deliver_service">
                Deliver Service:
            </label>
            <select class="form-control"id="deliver_service" name="deliver_service">
                <option value="{{$d->id}}">{{$d->province->PROVINCE_NAME}} to {{$d->provinces->PROVINCE_NAME}}</option>
            </select>
        </div>
        <div class="form-group">
            <label class="lable label-control">
                Deliver Name:
            </label>
            <select class="form-control" id="deliver" name="deliver">
                <option value="{{$d->drive->id}}">{{$d->drive->name}}</option>
            </select>
        </div>
        <div class="form-group">
            <label class="label label-control" for="orp">
                order vegetable product:
            </label>
           <select name="orp" class="form-control" id='orp'>
               
                   
                    @foreach($order as $o)
                    @if($o->tracking==null)
                    <option value={{$o->id}}>
                        or_id:{{$o->id}},cus_name: {{$o->usercustomer->name}},cus_address:{{$o->usercustomer->address}},cus_product:{{$o->product->product_name}},amount:{{$o->orp_amount}}KG, cus_order:{{$o->created_at}}
                    </option>    
                    @endif
                   
                    @endforeach
                
               
           </select>
        </div>
        <input type="submit" value="order" class="btn btn-primary">
    </form>
</div>

@endforeach
@endif
@endsection