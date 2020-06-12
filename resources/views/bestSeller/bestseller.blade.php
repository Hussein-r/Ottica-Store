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
            <div class="row">
                @forelse ($bestsellerglasses as $bestsellerglass)
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
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                            <a href="#">
                                <h6>{{$glass->brand->name}}</h6>
                            </a>
                            <span>{{$glass->glass_code}}</span>

                            {{-- <span style="margin-left: 20px">{{$colors}}</span> --}}
                            
                        <p class="product-price">
                            <span class="old-price">{{$glass->price_before_discount}}EGP</span> 
                            {{$glass->price_after_discount}}EGP
                            <span><h5 class="text-danger" style="text-align:right;">-30%</h5></span>
                        </p>
                        <hr/>
                        <span>Frame Colors</span>
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                <a href="{{route('glass.show', $glass->id)}}" class="btn essence-btn">View Details</a>
                                </div>
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
@endsection

