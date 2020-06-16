


 @extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/styling.css">
    <link rel="stylesheet" href="/css/core-style.css">
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
                            <h1>Eye Glasses</h1>
                            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 align-self-end">
                        <img src="/images/eyeglassmodel.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>
        </div>
    </div>
    <div class="mt-3" style="border-top:1px solid black;">
    @foreach ($glasses as $glass)
    <div class="single-product-wrapper mt-6 col-md-4 h-30" style="display:inline-block;">
        <!-- Product Image -->
        <div class="product-img" >
            <img src="images/{{$glass->images->first()->image}}" alt="">
            <!-- Favourite -->
            <div class="product-favourite">
                <button id="love"  onclick="updateFavorite({{$glass->id}},this)">&#x2764;</button>

                {{-- <a href="#" class="favme fa fa-heart"></a> --}}
            </div>
        </div>
        <!-- Product Description -->
        <div class="product-description">
            <span>{{$glass->code}}</span>
            <a  href="single-product-details.html">
                <h3 style="margin-left:10%;">{{$glass->brand->name}}</h6>
            </a>
            <p class="product-price">
                <span class="old-price">{{$glass->price_before_discount}}EGP</span> 
                {{$glass->price_after_discount}}EGP
                <span><h5 class="text-danger" style="text-align:right;">{{(($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100 }} %</h5></span>
            </p>
            <!-- Hover Content -->
            <div class="hover-content">
                <!-- Add to Cart -->
                <div class="add-to-cart-btn">
                    <a href="/glass/{{$glass->id}}" class="btn essence-btn">View Details</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach     
</div>
    </section>
<body>    
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/aos.js"></script>

<script src="/js/sunmain.js"></script>
<script src="{{ asset('/js/favourite.js') }}" defer></script>
<script src="/js/active.js"></script>
@endsection



