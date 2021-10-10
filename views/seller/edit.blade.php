@extends('layout.master')
@section('title')
EditOrderVeget
@endsection
@section('content')
<div class="container">
    @if($order)
    @foreach($order as $o)
    <h3>Edit vegetable Order:</h3>
    <form action="{{route('editveget.put',$o->id)}}" method="post">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="label label-form" for="tracking">
                Tracking Code
            </label>
            
            <input type="text" class="form-control" name="tracking" id="tracking" value="{{$o->tracking}}">
             
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Edit">
        </div>
    </form>
     @endforeach 
    @endif
</div>



@endsection