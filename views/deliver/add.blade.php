@extends('layout.master')
@section('title')
AddDelivery
@endsection
@section('content')
<form action="{{route('adddelivery.add',auth()->user()->id)}}"method='post' enctype="multipart/form-data">
    @csrf
    <!-- start -->
    <div class="form-group">
    <label for="start">Start Destination Province</label>

   <select name='start' id='start' class='form-control'>
       @if($province)
 @foreach($province as $p)
       <option value={{$p->id}}>{{$p->PROVINCE_NAME}}</option>
         @endforeach
@endif
   </select>
    </div>
    <!-- end -->
    <!-- stop -->
   <div class="form-group">
    <label for="stop">Stop Destination Province</label>

   <select name='stop' id='stop' class='form-control'>
       @if($province)
 @foreach($province as $p)
       <option value={{$p->id}}>{{$p->PROVINCE_NAME}}</option>
         @endforeach
@endif
   </select>
  </div>
  <!-- End -->
  <!-- active -->
  <div class="form-group">
    <label for="active">Status</label>

   <select name='active' id='active' class='form-control'>
       @if($active)
 @foreach($active as $a)
       <option value={{$a->id}}>{{$a->status_name}}</option>
         @endforeach
@endif
   </select>
  </div>
  <!-- END -->
<!-- duration -->
<div class="form-group">
    <label for="duration">Deliver Duration</label>
    <input type="number" class="form-control" id="duration" name="duration" value="{{old('duration')}}" min='0'>
    @error('duration')
    {{$message}}
    @enderror
  </div>
  <!-- price -->
  <div class="form-group">
    <label for="price">Deliver Price</label>
    <input type="number" class="form-control" id="price" name="price" value="{{old('price')}}" min='0.00'step="0.01">
    @error('price')
    {{$message}}
    @enderror
  </div>
  <!-- datefrom -->
  <div class="form-group">
    <label for="timefrom">Date From</label>
    <input type="datetime-local" class="form-control" id="timefrom" name="timefrom" value="{{old('timefrom')}}" >
    @error('timefrom')
    {{$message}}
    @enderror
  </div>
  <!-- dateto -->
  <div class="form-group">
    <label for="timeto">Date To</label>
    <input type="datetime-local" class="form-control" id="timeto" name="timeto" value="{{old('timeto')}}" >
    @error('timeto')
    {{$message}}
    @enderror
  </div>
  <!-- image -->
  <div class="form-group">
    <label for="image">Deliver Image</label>
    <input type="file" class="form-control-file" id="image" name="image" >
    @error('image')
    {{$message}}
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection