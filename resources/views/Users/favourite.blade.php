@extends('layouts.userNavbar')
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/styling.css">
    <link rel="stylesheet" href="/css/core-style.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
@section('content')
<body>
<section class="container">
<div class="site-blocks-cover" data-aos="fade">
    <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto order-md-2 align-self-start">
                    <div class="site-block-cover-content">
                        <h2 class="sub-title">Ottica Store</h2>
                        <h1>Your Favourite Glasses</h1>
                    </div>
                </div>
                <div class="col-md-6 order-1 align-self-end">
                    <img src="/images/fav.jpg" alt="Image" class="img-fluid">
                </div>
            </div>
    </div>
    </div>
    <div class="col-12 col-md-12 col-lg-12">
    <div class="shop_grid_product_area">
    <div class="row">

        @forelse ($glasses as $fav)
        <!-- Single Product -->
        <div class="col-12 col-sm-3 h-100 col-lg-3">
            <div class="single-product-wrapper">
                <!-- Product Image -->
                @if($fav->glass->images->first()->image)                        
                <div class="product-img">
                    <img style="height: 200px" src="/images/{{$fav->glass->images->first()->image}}" alt="product image">
                    @endif
                    <!-- Hover Thumb -->
                    <img class="hover-img" style="height: 250px" src="/images/{{$fav->glass->images->last()->image}}" alt="">

                    <!-- Product Badge -->
                    <div class="product-badge new-badge">
                    <span>{{$fav->glass->label}}</span>
                    </div>
                    
                    
                </div>

                <!-- Product Description -->
                <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                    <!-- Favourite -->
                    {{-- <div class="product-favourite" style="text-align: right">
                        <button class="favme fa fa-heart" id="love"  onclick="updateFavorite({{$fav->glass->id}},this)"></button>
                    </div> --}}

                    <a href="#">
                        <h6>{{$fav->glass->brand->name}}</h6>
                    </a>
                    <span>{{$fav->glass->glass_code}}</span>

                    {{-- <span style="margin-left: 20px">{{$colors}}</span> --}}
                    <p class="product-price">
                        <span class="old-price">{{$fav->glass->price_before_discount}}EGP</span> 
                        {{$fav->glass->price_after_discount}}EGP
                        <span><h5 class="text-danger" style="text-align:right;">{{round((($fav->glass->price_before_discount - $fav->glass->price_after_discount)/$fav->glass->price_before_discount)*100) }} %</h5></span>
                    </p>
            
                    <!-- Hover Content -->
                    <div class="hover-content">
                        <!-- Add to Cart -->
                        <div class="add-to-cart-btn">
                        <a href="{{route('glass.show', $fav->glass->id)}}" class="btn essence-btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
            No favourite products..!
        </div>
            
        @endforelse
        
    </div>
    </div>
    </div>

</section>
@endsection