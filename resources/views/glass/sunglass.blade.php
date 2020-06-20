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
    <div class="mt-3" style="border-top:1px solid black;">
        <div class="product-sorting d-flex" style="text-align: right">
            <strong>Sort by:</strong>
            {{-- <form action="/price" method="post">
                @csrf --}}
            <select name="select" id="sortByselect">
                <option value="" disabled selected>Sorting by Price</option>
                <option value="low">Price: Low - High</option>
                <option value="high">Price: High - Low</option>
            </select>
            <input type="hidden" id='glassType' value="sun" name="type"/>
            {{-- <input type="submit" name="sort" value="sort"/>

        </form> --}}
        </div>
        <div id="glassArea">
    @foreach ($glasses as $glass)
    <div class="single-product-wrapper mt-6 col-md-4 h-30" style="display:inline-block;">
        <!-- Product Image -->
        <div class="product-img" >
            <img src="images/{{$glass->images->first()->image}}" alt="">
            <!-- Favourite -->
            <div class="product-favourite">
                <a {{ $glass->favourite->count() ? "style=color:red;" : ''}} id="love"  onclick="return(updateFavorite({{$glass->id}},this))" class="favme fa fa-heart"></a>
            </div>
        </div>
        <!-- Product Description -->
        <div class="product-description">
            <span>{{$glass->glass_code}}</span>
            <a  href="single-product-details.html">
                <h3 style="margin-left:10%;">{{$glass->brand->name}}</h6>
            </a>
            <p style="margin-left:10%;" class="product-price"><strong class="price"><del>{{$glass->price_before_discount}}</del> 
                    {{$glass->price_after_discount}}</strong></p>
                    <span><h5 class="text-danger" style="text-align:right;">{{round((($glass->price_before_discount - $glass->price_after_discount)/$glass->price_before_discount)*100) }} %</h5></span>

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
</div>
    </section>
<body>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-2.2.4.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/aos.js"></script>
<script src="/js/sunmain.js"></script>
<script src="{{ asset('/js/favourite.js') }}" defer></script>
<script src="/js/active.js"></script>
@endsection



