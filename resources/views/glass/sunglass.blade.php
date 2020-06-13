@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/styling.css">
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
                            <h1>Sun Glasses</h1>
                            <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 align-self-end">
                        <img src="/images/model_3.png" alt="Image" class="img-fluid">
                    </div>
                </div>
        </div>
    </div>

        <div class="col-12 col-md-8 col-lg-9">
            <div class="shop_grid_product_area">
                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-flex align-items-center justify-content-between">
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                <p>Sort by:</p>
                                <select name="select" id="sortByselect">
                                    
                                    <option  value="low" >Price: Low - High</option>
                                    <option value="high" >Price: High - Low</option>
                                </select>
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
                                <button id="love"  onclick="updateFavorite({{$glass->id}},this)">&#x2764;</button>
                            </div>
                            <a href="#">
                                <h6>{{$glass->brand->name}}</h6>
                            </a>
                            <span>{{$glass->glass_code}}</span>

                            {{-- <span style="margin-left: 20px">{{$colors}}</span> --}}
                            
                        <p class="product-price">
                            <span class="old-price">{{$glass->price_before_discount}}EGP</span> 
                            {{$glass->price_after_discount}}EGP
                            <span><h5 class="text-danger" style="text-align:right;">{{(($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100 }} %</h5></span>
                        </p>
                        <hr/>
                        <span>Frame Colors</span>
                        {{-- <div class="row" style="margin: 5px;">
                            @forelse ($colors as $color)
                                <div style="width: 30px; border: lightgrey solid 1px; border-radius: 50%; background-color:{{$color->name}};">
                                    <pre>   </pre>
                                </div>      
                            @empty
                            
                            @endforelse
                        </div> --}}
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                <a href="{{route('glass.show', $glass->id)}}" class="btn essence-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-info" style="margin:40px auto; text-align:center; width:500px">
                        No products yet!
                    </div>
                        
                    @endforelse
                </div>
            </div>
        </div>

    </section>
<body>

<script src="{{ asset('/js/favourite.js') }}" defer></script>
@endsection



