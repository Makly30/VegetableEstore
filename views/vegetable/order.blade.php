@extends('layout.master')
@section('title')
OrderVegetable
@endsection
@section('content')
<h3 class="text-center">Order Vegetable Product:</h3>
@if($products)
@foreach($products as $p)

@if(session('status'))
<div class="alert alert-danger" role="alert"> {{session('status')}}</div>
@endif
<form action="{{route('add.order',['p'=>$p->id,'cus'=>auth()->user()->id])}}"method='post' >
    @csrf
 
  <div class="form-group">
    <label for="orp_amount">Amount</label>
    <input type="number" class="form-control" id="orp_amount" name="orp_amount">
  </div>
 
  <div class="form-group">
    <label for="orp_dc">Status</label>

   <select name='orp_dc' id='orp_dc' class='form-control'>
       @if($dc)
 @foreach($dc as $d)
       <option value={{$d->id}}>{{$d->deliver_choice_name}}</option>
         @endforeach
@endif
   </select>

  </div>

  <button type="submit" class="btn btn-primary">Order</button>
</form>
@endforeach
@endif

@endsection