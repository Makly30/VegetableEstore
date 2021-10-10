<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>@yield('title')</title>
    <!--  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 

    <!--  -->
    <style>
        header{
            color:green;
            background-color: lightgray;
            height: 50px;
        }
    </style>
</head>
<body>
    <header>
        <h3 class="text-center pt-1">Vegetable</h3>
    </header>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{route('home')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('vegetable')}}">Vegetable</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('showdeliver')}}">Deliver</a>
      </li>
    </ul>
    @auth
    @if(auth()->user()->status=='seller')
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         {{auth()->user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('myinfo',auth()->user()->id)}}">seller_info</a>
          <a class="dropdown-item" href="{{route('ownproduct')}}">seller_product</a>
          <a class="dropdown-item" href="{{route('customer.order',auth()->user()->id)}}">seller_order</a>
          <a class="dropdown-item" href="{{route('deliverservice.showcustomer',auth()->user()->id)}}">seller_orderservice</a>
          <a class="dropdown-item" href="{{route('mydata.income',auth()->user()->id)}}">MYPROCESS DATA</a>
          <a class="dropdown-item" href="{{route('logout')}}">LogOut</a>
        </div>
      </li>
      </ul>
    </span>
    @elseif(auth()->user()->status=='customer')
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         {{auth()->user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('myinfo',auth()->user()->id)}}">customer_info</a>
          <a class="dropdown-item" href="{{route('myordershow',auth()->user()->id)}}">customer_order</a>
          <a class="dropdown-item" href="{{route('mydatainsite',auth()->user()->id)}}">MYPROCESS DATA</a>
          <a class="dropdown-item" href="{{route('logout')}}">LogOut</a>
        </div>
      </li>
      </ul>
    </span>
    @else
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         {{auth()->user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('myinfo',auth()->user()->id)}}">deliver_info</a>
          <a class="dropdown-item" href="{{route('addform',auth()->user()->id)}}">deliver_service</a>
          <a class="dropdown-item" href="{{route('deliverservice.showorder',auth()->user()->id)}}">deliver_orderservice</a>
          <a class="dropdown-item" href="{{route('mydataprocess',auth()->user()->id)}}">MYPROCESS DATA</a>
          <a class="dropdown-item" href="{{route('logout')}}">LogOut</a>
        </div>
      </li>
      </ul>
    </span>
      @endif
    @endauth
    @guest
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('register')}}">Login/SignUp</a>
      </li>
      </ul>
    </span>
    @endguest
  </div>
</nav>
@yield('content')
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>