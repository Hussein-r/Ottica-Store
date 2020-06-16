@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/core-style.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/styling.css">
</head>
<<<<<<< HEAD
@section('content')
<body style="background-color:white;">
=======

<body>
>>>>>>> a0583aea90a19a37984a8578213556b3e4450e37
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
                <a href="#" class="favme fa fa-heart"></a>
            </div>
        </div>
        <!-- Product Description -->
        <div class="product-description">
            <span>{{$glass->code}}</span>
            <a  href="single-product-details.html">
                <h3 style="margin-left:10%;">{{$glass->brand->name}}</h6>
            </a>
            <p style="margin-left:10%;" class="product-price"><strong class="price"><del>{{$glass->price_before_discount}}</del>                 {{$glass->price_after_discount}}</strong></p>
    <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-flex align-items-center justify-content-between">
                        <!-- Sorting -->
                        <div class="product-sorting d-flex">
                            <p>Sort by:</p>
                            {{-- <form action="/sort" method="POSt"> --}}
                                {{-- {{ csrf_field() }} --}}
                                <select name="select" id="sortByselect">
                                    
                                    <option  value="low" >Price: Low - High</option>
                                    <option value="high" >Price: High - Low</option>
                                </select>
                                {{-- <input type="submit" class="d-none" value="select"> --}}
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($glasses as $glass)
                {{$allcolors = $glasses->where("glass_code",$glass->glass_code)->get('color_id')}}
                {{-- {{$colors=Color::whereIn("id",$allcolors)->get('name')}} --}}
                <!-- Single Product -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        @if($glass->images->first()->image)                        
                        <div class="product-img">
                            <img style="height: 150px" src="/images/{{$glass->images->first()->image}}" alt="product image">
                            @endif
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="/images/{{$glass->images->last()->image}}" alt="">

                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                            <span>{{$glass->label}}</span>
                            </div>
                            
                            
                        </div>

                        <!-- Product Description -->
                        <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                            <!-- Favourite -->
                            <div class="product-favourite" style="text-align: right">
                                <button class="favme fa fa-heart" id="love"  onclick="updateFavorite({{$glass->id}},this)"></button>
                            </div>
                    
                            <a href="#">
                                <h6>{{$glass->brand->name}}</h6>
                            </a>
                            <span>{{$glass->glass_code}}</span>

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
            <div style="text-align: center;">
                {{-- {{ $glasses->links() }} --}}
            </div>
        </div>
</section>
</body>
<script src="{{ asset('/js/favourite.js') }}" defer></script>

</html>


