@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/core-style.css">
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="/css/styling.css">
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
                        <h1>Best Seller</h1>
                        <p><a href="#" class="btn btn-black rounded-0">Shop Now</a></p>
                    </div>
                </div>
                <div class="col-md-6 order-1 align-self-end">
                    <img src="/images/best.jpg" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-5 ml-30">
            <div class="section-heading text-center">
                <h2>Glasses Section</h2>
            </div>
        </div>
        @foreach ($bestsellerglasses as $bestGlass)
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-product-wrapper">                        
                <div class="product-img mt-5">
                    <img style="height:150px; width:247px" src="/images/{{$bestGlass->images->first()->image}}" alt="product image">
                </div>
                <!-- Product Badge -->
                <div class="product-badge new-badge">
                    <span>{{$bestGlass->label}}</span>
                </div>
                <!-- Favourite -->
                <div class="product-favourite">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
            <!-- Product Description -->
            <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                <span>{{$bestGlass->glass_code}}</span>
                @foreach($bestSellerGlassColor as $bestColor)
                @if ($bestGlass->color_id == $bestColor->id)
                    <span style="margin-left: 20px">{{$bestColor->name}}</span> 
                @endif
                @endforeach
                <p class="product-price">
                    <span class="old-price">{{$bestGlass->price_before_discount}}EGP</span> 
                    {{$bestGlass->price_after_discount}}EGP
                    <span><h5 class="text-danger" style="text-align:right;">-30%</h5></span>
                </p>                     
                <div class="hover-content">
                    <div class="add-to-cart-btn">
                        <a href="{{route('glass.show', $bestGlass->id)}}" class="btn essence-btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($glassProducts as $GlassProduct)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-product-wrapper">                       
                    <div class="product-img mt-5">
                        <img style="height:150px; width:247px" src="/images/{{$GlassProduct->images->first()->image}}" alt="product image">
                    </div>
                    <div class="product-badge new-badge">
                        <span>{{$GlassProduct->label}}</span>
                    </div>
                    <div class="product-favourite">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
                <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                    <span>{{$GlassProduct->glass_code}}</span>
                    @foreach($glassProductsColor as $GlassProductColor)
                    @if ($GlassProduct->color_id == $GlassProductColor->id)
                        <span style="margin-left: 20px">{{$GlassProductColor->name}}</span> 
                    @endif
                    @endforeach
                    <p class="product-price">
                        <span class="old-price">{{$GlassProduct->price_before_discount}}EGP</span> 
                            {{$GlassProduct->price_after_discount}}EGP
                        <span><h5 class="text-danger" style="text-align:right;">-30%</h5></span>
                    </p>                    
                    <div class="hover-content">
                        <div class="add-to-cart-btn">
                            <a href="{{route('glass.show', $GlassProduct->id)}}" class="btn essence-btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 mt-5 ml-30">
            <div class="section-heading text-center">
                <h2>Lenses Section</h2>
            </div>
        </div>
        @foreach ($bestsellerlenses as $BestLense)
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-product-wrapper">
                <div class="product-img mt-5">
                    <img style="height:150px; width:247px" src="/images/{{$BestLense->image}}" alt="product image">
                </div>
                <div class="product-badge new-badge">
                    <span>{{$BestLense->label}}</span>
                </div>
                <div class="product-favourite">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
            <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                <span>{{$BestLense->name}}</span>
                @foreach($bestSellerLenseColor as $bestColor)
                @if ($BestLense->color_id == $bestColor->id)
                    <span style="margin-left: 20px">{{$bestColor->name}}</span> 
                @endif
                @endforeach
                <p class="product-price">
                    <span class="old-price">{{$BestLense->price_before_discount}}EGP</span> 
                        {{$BestLense->price_after_discount}}EGP
                    <span><h5 class="text-danger" style="text-align:right;">-30%</h5></span>
                </p>
                <div class="hover-content">
                    <div class="add-to-cart-btn">
                        <a href="{{route('lenses.show', $BestLense->id)}}" class="btn essence-btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($lenseProducts as $LenseProduct)
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="single-product-wrapper">
                <div class="product-img mt-5">
                    <img style="height:150px; width:247px" src="/images/{{$LenseProduct->image}}" alt="product image">
                </div>
                <div class="product-badge new-badge">
                    <span>{{$LenseProduct->label}}</span>
                </div>
                <div class="product-favourite">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
            <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                <span>{{$LenseProduct->name}}</span>
                @foreach($lenseProductsColor as $bestColor)
                @if ($LenseProduct->color_id == $bestColor->id)
                    <span style="margin-left: 20px">{{$bestColor->name}}</span> 
                @endif
                @endforeach
                <p class="product-price">
                    <span class="old-price">{{$LenseProduct->price_before_discount}}EGP</span> 
                    {{$LenseProduct->price_after_discount}}EGP
                    <span><h5 class="text-danger" style="text-align:right;">-30%</h5></span>
                </p>
                <div class="hover-content">
                    <div class="add-to-cart-btn">
                        <a href="{{route('lenses.show', $LenseProduct->id)}}" class="btn essence-btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>      
</section>      
</body>
@endsection

