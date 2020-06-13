@extends('layouts.app')
@section('content')
<section class="container">
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Best Seller</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row ">
                 @foreach ($bestsellerglasses as $bestGlass)
                <!-- Single Product -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                     @foreach($bestSellerGlassImages as $bestImg)
                        @if($bestGlass->id == $bestImg->glass_id)                        
                        <div class="product-img mt-5">
                            <img style="height:150px; width:247px" src="/images/{{$bestImg->first()->image}}" alt="product image">
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
                            <img style="height:150px; width:247px" src="/images/{{$ProductGlassImg->first()->image}}" alt="product image">
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

