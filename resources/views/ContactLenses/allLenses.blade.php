@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ottica</title>
    <link rel="icon" href="/img/core-img/favicon.ico">
    <link rel="stylesheet" href="/css/styling.css">
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/style.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">

</head>
@section('content')
<body style="background-color:white;">
<section class="container">
<div class="site-blocks-cover" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto order-md-2 align-self-start">
                    <div class="site-block-cover-content">
                        <h2 class="sub-title">Ottica Store</h2>
                        <h1>Contact Lenses</h1>
                        <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                    </div>
                </div>
                <div class="col-md-6 order-1 align-self-end">
                    <img src="/images/contactlense.jpg" alt="Image" style="height:100%;" class="img-fluid">
                </div>
            </div>
        </div>
</div>
<div class="row" >
    <div class="col-12" >
        <div class="product-topbar d-flex align-items-center justify-content-between mt-3" style="float:right;">
            <div>
                <!-- Total Products -->
                {{-- <div class="total-products">
                        <p><span>{{count($lenses)}}</span> products found</p>
                    </div> 
                --}}
                <!-- Sorting -->
                

                <div class="btn-group" >
                    <button type="button" class="btn btn-danger" disabled>Sorted BY</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item"  href='/sortt/1'>Newest</a>
                        <a class="dropdown-item"  href='/sortt/4'>Name</a>
                        <a class="dropdown-item" href="/sortt/2">Price: $ - $$</a>
                        <a class="dropdown-item" href="/sortt/3">Price: $$ - $</a>  
                    </div>
                <div>
            </div>
        </div>
    </div>
</div>
<div class="site-section ">
    <div class="container">
        <div class="row mb-5">
            <div class="col-9">
                <div id="filter_data" style="float:right;" >
                    @foreach ($lenses as $lense)
                    <div class="single-product-wrapper col-md-9 mt-6 col-4 h-30 border p-4" style="display:inline-block;">
                        <div class="product-img" >
                            <img src="images/{{$lense->image}}" alt="">
                            <div class="product-favourite">
                                <a onclick="return(updateFavorite({{$lense->id}},this))" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <div class="product-description">
                            <span>{{$lense->name}}</span>

                            <a href="single-product-details.html">
                                <h3 >{{$lense->brand->name}}</h6>
                            </a>
                            <ul>
                            @foreach ($lense->lenseType as $lensetype)
                                <li> {{$lensetype->duration}} Days &emsp; For {{$lensetype->price}} EGP</li>
                            @endforeach
                            </ul>
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="/lenses/{{$lense->id}}" class="btn essence-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach  
                </div>
                <div class="col-md-4 order-2 mb-5 mb-md-0 " style="float:left;display:inline:block;">
                    <div class="border p-4 rounded mb-4 filteration">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Brand</h3>
                        <ul class="list-unstyled mb-0" >
                        @foreach($brands as $brand)
                        <li class="mb-1"> <input id="brand" type="checkbox" value="{{$brand->id}}"><span> {{$brand->name}}</span></li>
                        @endforeach 
                        </ul>
                    </div>
                    <div class="border p-4 rounded mb-4 filteration">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Types</h3>
                        <ul class="list-unstyled mb-0">
                        @foreach($types as $type)
                            <li class="mb-1"> <input type="checkbox"  id="type"  value="{{$type->id}}"><span> {{$type->name}}</span></li>
                        @endforeach 
                        </ul>
                    </div>
                    <div class="border p-4 rounded mb-4 filteration">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">manufacturers</h3>
                        <ul class="list-unstyled mb-0" >
                        @foreach($manufacturers as $manufacturer)
                            <li class="mb-1"> <input type="checkbox" id="manufacturer" value="{{$manufacturer->id}}"><span> {{$manufacturer->name}}</span></li>
                        @endforeach 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</body>
@endsection
<script src="/js/aos.js"></script>
<script src="/js/sunmain.js"></script>
<script src="/js/jquery/jquery-2.2.4.min.js"></script>
<script src="/js/lenseFilteration.js"></script>
</html>