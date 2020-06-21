@extends('layouts.app')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>Best Seller</title>
    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
</head>
@section('content')
<body>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area breadcumb-style-two bg-img" style="background-image: url(img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Best</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row ">
            <div class="row">
         <div class="col-12 mt-5 ml-30">
                    <div class="section-heading text-center">
                        <h2>Lenses Section</h2>
                    </div>
         </div>
                 @foreach ($bestsellerglasses as $bestGlass)
                <!-- Single Product -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                     @foreach($bestSellerGlassImages as $bestImg)
                        @if($bestGlass->id == $bestImg->glass_id)                        
                        <div class="product-img mt-5">
                            <img style="height:150px; width:247px" src="/images/{{$bestImg->image}}" alt="product image">
                            @endif
                            @endforeach
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
                        <hr/>
                        <span>Frame Colors</span>
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                <a href="{{route('glass.show', $bestGlass->id)}}" class="btn essence-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
                @endforeach

                @foreach ($glassProducts as $GlassProduct)
                <!-- Single Product -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                     @foreach($glassProductsImages as $ProductGlassImg)
                        @if($GlassProduct->id == $ProductGlassImg->glass_id)                        
                        <div class="product-img mt-5">
                            <img style="height:150px; width:247px" src="/images/{{$ProductGlassImg->image}}" alt="product image">
                            @endif
                            @endforeach
                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                            <span>{{$GlassProduct->label}}</span>
                            </div>
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>

                        <!-- Product Description -->
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
                        <hr/>
                        <span>Frame Colors</span>
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                <a href="{{route('glass.show', $GlassProduct->id)}}" class="btn essence-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
                @endforeach










            </div>
        </div>
    </div>

</section>
@endsection

