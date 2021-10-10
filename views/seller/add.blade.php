@extends('layout.master')
@section('title')
Add Product
@endsection
@section('content')
<form action="{{route('product.store')}}"method='post' enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="product_name">Product Name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value="{{old('product_name')}}">
    @error('product_name')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="measure">Measure</label>
    <input type="number" class="form-control" id="measure" name="measure" value="{{old('measure')}}"min='0.00' step="0.01">
    @error('measure')
    {{$message}}
    @enderror
  </div>

  <div class="form-group">
    <label for="product_price">Product Price</label>
    <input type="number" class="form-control" id="product_price" name="product_price" value="{{old('product_price')}}" min='0.00'step="0.01">
    @error('product_price')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="amount">Amount (KG)</label>
    <input type="number" class="form-control" id="amount" name="amount" value="{{old('amount')}}"min='0'>
    @error('amount')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="province_from">Product From</label>
    <input type="text" class="form-control" id="province_from" name="province_from" value="{{old('province_from')}}"min='0.00'step="0.01">
    @error('province_from')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="deliver_in">Deliver In Price</label>
    <input type="number" class="form-control" id="deliver_in" name="deliver_in" value="{{old('deliver_in')}}"min='0.00'step="0.01">
    @error('deliver_in')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="deliver_out">Deliver Out Price</label>
    <input type="number" class="form-control" id="deliver_out" name="deliver_out" value="{{old('deliver_out')}}" min='0.00'step="0.01">
    @error('deliver_out')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="timefrom">Date From</label>
    <input type="datetime-local" class="form-control" id="timefrom" name="timefrom" value="{{old('timefrom')}}" >
    @error('timefrom')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="timeto">Date To</label>
    <input type="datetime-local" class="form-control" id="timeto" name="timeto" value="{{old('timefrom')}}" >
    @error('timefrom')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="available_time">Available Time (Days) </label>
    <input type="number" class="form-control" id="available_time" name="available_time"  min='0.00'step="0.01">
    @error('available_time')
    {{$message}}
    @enderror
  </div>
  <div class="form-group">
    <label for="image">Product Image</label>
    <input type="file" class="form-control-file" id="image" name="image" >
    @error('image')
    {{$message}}
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection