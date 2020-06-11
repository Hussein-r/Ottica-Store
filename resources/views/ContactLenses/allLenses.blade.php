@extends('layouts.userNavbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>brands</title>
    <!-- Favicon  -->
    <link rel="icon" href="/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/style.css">
</head>
@section('content')
<body>
<section class="container">
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Conatct Lenses</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8 col-lg-9">
        <div class="shop_grid_product_area">
            <div class="row">
                <div class="col-12">
                    <div class="product-topbar d-flex align-items-center justify-content-between">
                   
                </div>
                        <!-- Total Products -->
                        {{-- <div class="total-products">
                            <p><span>{{count($lenses)}}</span> products found</p>
                        </div> --}}
                        <!-- Sorting -->
                       

                        <div class="btn-group" style=margin-left:900px;>
                            <button type="button" class="btn btn-danger">Sorted BY</button>
                            <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"  href='/sort/1'>Newest</a>
                                <a class="dropdown-item"  href='/sort/4'>Name</a>
                                <a class="dropdown-item" href="/sort/2">Price: $ - $$</a>
                                <a class="dropdown-item" href="/sort/3">Price: $$ - $</a>
                                
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($lenses as $lense)
               
                {{-- {{$colors=Color::whereIn("id",$allcolors)->get('name')}} --}}
                <!-- Single Product -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        @if($lense->images->first())                        
                        <div class="product-img">
                            <img style="height: 150px" src="/images/{{$lense->images->first()->image}}" alt="product image">
                            @endif
                            <!-- Hover Thumb -->
                            @if($lense->images->last())     
                            <img class="hover-img" src="/images/{{$lense->images->last()->image}}" alt="">
                            @endif
                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                            <span>{{$lense->label}}</span>
                            </div>
                            
                        </div>

                        <!-- Product Description -->
                        <div class="product-description" style="padding: 5px; border: lightgrey solid 1px;">
                            <a href="#">
                                <h6>{{$lense->brand->name}}</h6>
                            </a>
                            <h3>{{$lense->name}}</h3>
                            
                            <p class="product-price">
                                <span class="old-price">{{$lense->price_before_discount}}EGP</span> 
                                {{$lense->price_after_discount}}EGP
                                <span><h5 class="text-danger" style="text-align:right;">-40%</h5></span>
                            </p>
                    
                    
                        
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                 <a href="{{route('lenses.show', $lense->id)}}" class="btn essence-btn">View Details</a>
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
</section>
</body>

@endsection
</html>